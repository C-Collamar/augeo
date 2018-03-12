<?php

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

function display404() {
    exit(
    '<style>'.
        '#back-btn {'.
            'display: block;'.
            'width: fit-content;'.
            'margin: 30px auto 0px auto;'.
            'background-color: #a53a41;'.
            'border: 4px solid #a53a41;'.
            'padding: 10px 16px;'.
            'color: white;'.
            'transition: 0.2s;'.
        '}'.
        '#back-btn:hover {'.
            'background-color: #ffffff;'.
            'color: #a53a41;'.
        '}'.
    '</style>'.
    '<div style="text-align: center; padding-top: 50px;">'.
        '<div style="font-size: 100px; user-select: none">404</div>'.
        '<div style="font-size: 20px; ">OOPS! SORRY WE CAN\'T FIND THAT ITEM!</div>'.
        '<div style="font-size: 15px; ">How about visiting our browsing section?</div>'.
        '<a href="http://localhost/augeo/browse" id="back-btn">Have fun!</a>'.
    '</div>'
    );
}

?>
<!DOCTYPE html>
<html>
<head>
<title>View Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/std_notif.css">
    <link rel="stylesheet" href="css/view_item.css">
</head>
<body>
    <?php
    require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";

    if(isset($_GET['id'])) { //if ID is present in the URI
        $item_id = encode($_GET['id']);

        //get item and seller information
        $query =
            "SELECT ".
                "item.*, ".
                "user.user_id, ".
                "f_name, ".
                "m_name, ".
                "l_name, ".
                "email, ".
                "profile_img ".
            "FROM ".
                "augeo_user_end.item, ".
                "augeo_user_end.user ".
            "WHERE ".
                "user.user_id = item.user_id AND ".
                "item.item_id = $item_id AND ".
                "item.state = 0";
        $item_info = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);

        if(mysqli_num_rows($item_info) <= 0) {
            display404();
        }
        else {
            $item_info = $item_info->fetch_assoc();
            $seller_fname = decode($item_info['f_name']);
            $seller_mname = decode($item_info['m_name']);
            $seller_lname = decode($item_info['l_name']);
            $seller_email = decode($item_info['email']);
            $seller_profile_img = decode($item_info['profile_img']);
            $item_name = decode($item_info['name']);
            $item_descr = decode($item_info['description']);
        }

        //get item tag(s)
        $query =
            "SELECT ".
                "tag.tag_id, ".
                "tag.tag_name ".
            "FROM ".
                "augeo_user_end.tag, ".
                "augeo_application.tagged_item ".
            "WHERE ".
                "tag.tag_id = tagged_item.tag_id AND ".
                "tagged_item.item_id = $item_id";
        $db_tags = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);

        //get item image(s)
        $query = "SELECT img_path FROM augeo_user_end.item_img WHERE item_id = $item_id";
        $db_img_paths = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);
        $img_path = array();
        while($path = $db_img_paths->fetch_assoc()) {
            array_push($img_path, decode($path['img_path']));
        }

        //get item bids
        $query =
            "SELECT ".
                "bid.timestamp, ".
                "bid.amount, ".
                "user_account.username ".
            "FROM ".
                "augeo_application.bid, ".
                "augeo_user_end.user, ".
                "augeo_user_end.user_account ".
            "WHERE ".
                "bid.item_id = $item_id AND ".
                "bid.user_id = user.user_id AND ".
                "user.account_id = user_account.account_id ".
            "ORDER BY bid.timestamp DESC";
        $db_bids = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);
        $bid_info = array();
        while($bid = $db_bids->fetch_assoc()) {
            array_push($bid_info, $bid);
        }

        //item's current amount
        $curr_amount = sprintf("%.2f", ((count($bid_info) == 0)? $item_info['initial_price']: $bid_info[0]['amount']));
        $step_count = $item_info['bid_interval'];
        $min_bid = sprintf("%.2f", $curr_amount + $step_count);
    ?>
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['account_id'] ?>">
    <input type="hidden" id="item_id" name="item_id" value="<?php echo $item_id ?>">
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-sm-5" style="position: relative">
                <div id="imgCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php
                    $len = count($img_path);
                    $active_class = ' class="active"';
                    for($count = 0; $len--; ++$count) {
                        echo '<li data-target="#imgCarousel" data-slide-to="'.$count.'"'.$active_class.'></li>';
                        $active_class = '';
                    }
                    ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $class = ' active';
                        foreach($img_path as $path) {
                            echo '<div class="item'.$class.'"><img class="pannable" src="'.$path.'"></div>';
                            $class = '';
                        }
                        ?>
                    </div>
                    <a class="left carousel-control" href="#imgCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#imgCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-7">
                <div id="title"><?php echo $item_name; ?></div>
                <div style="text-align: center">
                    <div style="display: inline-block">
                        <span id="amount-label">Current amount</span><span id="amount">Php <?php echo $curr_amount; ?></span>
                    </div>
                    <div style="display: inline-block">
                        <button id="bid-sect-toggler" class="btn btn-success" data-toggle="collapse" data-target="#bid-sect">Bid</button>
                    </div>
                </div>
                <div id="bid-sect" class="collapse panel panel-default" style="margin-top: 20px">
                    <div class="panel-heading">INSTUCTIONS</div>
                    <form id="bid-form" class="panel-body">
                        <p id="bid-instruction">
                            Enter your bid amount. This item has incremental bid interval set to <span class="nowrap">
                            Php <?php echo $step_count.'.00' ?></span>. The minimum input bid currently starts at <span class="nowrap">
                            Php <?php echo $min_bid; ?></span>. <a href="#">Learn more.</a>
                        </p>
                        <div class="input-group">
                            <label for="bid-amount" class="input-group-addon">Your bid</label>
                            <input id="bid-amount" type="number" class="form-control" name="bid-amount"
                            placeholder="Your bid must be greater or equal to Php <?php echo $min_bid ?>"
                            min="<?php echo $min_bid ?>" required>
                        </div>
                        <div style="padding: 10px; text-align: center">
                            <div id="paypal-button"></div>
                            <button type="submit" class="btn btn-success">Bid</button>
                            <button type="button" id="bid-cancel" class="btn btn-default" data-toggle="collapse" data-target="#bid-sect">Cancel</button>
                        </div>
                    </form>
                </div>
                <div id="description"><?php echo $item_descr; ?></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div id="details">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Seller</th>
                                <td><?php echo $seller_fname; ?></td>
                            </tr>
                            <tr>
                                <th>Initial price</th>
                                <td>Php <?php echo sprintf("%.2f", $item_info['initial_price']); ?></td>
                            </tr>
                            <tr>
                                <th>Upload date</th>
                                <td><?php echo date("F j, Y", strtotime($item_info['timestamp'])); ?></td>
                            </tr>
                            <tr>
                                <th>View count</th>
                                <td><?php echo $item_info['view_count']; ?> times</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="history-sect" class="panel panel-default">
                    <div class="panel-heading">HISTORY</div>
                    <div class="panel-body">
                        <div id="history-table">
                            <?php
                            $num_row = mysqli_num_rows($db_bids);

                            foreach($bid_info as $bid) {
                                $bid_date = date("M j, Y", strtotime($bid['timestamp']));
                                $bid_amount = sprintf("%.2f", $bid['amount']);
                                $bidder = decode($bid['username']);
                                echo(
                                '<div class="bid-history-row">'.
                                    '<div><div class="bid-date">'.$bid_date.'</div></div>'.
                                    '<div><div class="node"><div></div></div></div>'.
                                    '<div><div class="bid-amount">Php '.$bid_amount.'</div></div>'.
                                    '<div><div class="bidder"><a href="http://localhost/augeo/users/'.$bidder.'">'.$bidder.'</a></div></div>'.
                                '</div>'
                                );
                            }

                            echo(
                            '<div class="bid-history-row">'.
                                '<div><div class="bid-date">'.date("M j, Y", strtotime($item_info['timestamp'])).'</div></div>'.
                                '<div><div class="start-node"></div></div>'.
                                '<div><div class="bid-amount">Php '.sprintf("%.2f", $item_info['initial_price']).'</div></div>'.
                                '<div style="color: #777777">Base price</div>'.
                            '</div>'
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div id="taglist">
                <?php
                while($tag = $db_tags->fetch_assoc()) {
                    echo '<a href="#" class="tag">'.decode($tag['tag_name']).'</a>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php } else display404(); ?>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/view_item.js"></script>
</body>
</html>