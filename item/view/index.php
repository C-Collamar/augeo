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
                "item.item_id = $item_id";
        $item_info = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);

        if(mysqli_num_rows($item_info) <= 0) {
            display404();
        }
        else {
            $item = $item_info->fetch_assoc();
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
        $tags = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);

        //get item image(s)
        $query = "SELECT img_path FROM augeo_user_end.item_img WHERE item_id = $item_id";
        $img_paths = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);
    ?>
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-sm-5">
                <div id="imgCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#imgCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imgCarousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="http://localhost/augeo/data/user/items/17_0.jpg">
                        </div>
                        <div class="item">
                            <img src="http://localhost/augeo/data/user/items/19_0.jpg">
                        </div>
                    </div>
                    <!-- Left and right controls -->
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
                <div id="title">Sample Item Name</div>
                <div style="text-align: center">
                    <div style="display: inline-block">
                        <span id="amount-label">Current amount</span><span id="amount">Php 275.00</span>
                    </div>
                    <div style="display: inline-block">
                        <button id="bid-sect-toggler" class="btn btn-success" data-toggle="collapse" data-target="#bid-sect">Bid</button>
                    </div>
                </div>
                <div id="bid-sect" class="collapse panel panel-default" style="margin-top: 20px">
                    <div class="panel-heading">INSTUCTIONS</div>
                    <form action="" class="panel-body">
                        <p id="bid-instruction">Enter your bid amount. Bid interval for this item is <span class="nowrap">Php 5.00</span>. The minimum input bid is currently at <span class="nowrap">Php 280.00</span>. <a href="#">Learn more.</a></p>
                        <div class="input-group">
                            <label for="bid-amount" class="input-group-addon">Your bid</label>
                            <input id="bid-amount" type="number" class="form-control" name="bid-amount" placeholder="Please enter your bid" step="5" min="280" value="280" required>
                        </div>
                        <div style="padding: 10px; text-align: center">
                            <button type="submit" class="btn btn-success">Bid</button>
                            <button type="button" id="bid-cancel" class="btn btn-default" data-toggle="collapse" data-target="#bid-sect">Cancel</button>
                        </div>
                    </form>
                </div>
                <div id="description">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam est inventore quam culpa. Optio asperiores ex sint cum voluptate quidem ipsam, enim reiciendis eaque dolorem dolore aspernatur voluptatibus, eum quaerat!
                        Voluptas odit numquam deserunt iure commodi libero ut omnis iusto optio possimus laborum labore quae, dolorum nulla culpa repellendus beatae eos molestias eveniet quidem consequuntur quis aut tempora. Qui, labore.
                        Distinctio facilis, sequi provident in voluptates, rerum tempora, mollitia dolore maiores tenetur at ex fugiat similique officia vero minima nulla accusamus sed magni ducimus voluptatum possimus eos. Commodi, numquam vitae.
                        Sequi, mollitia eum laborum necessitatibus omnis ducimus nam, nihil doloremque sit inventore et ipsum numquam incidunt rerum. Eaque repellat iste, id, veritatis quae itaque, inventore libero commodi sed fugiat error.
                        Tenetur numquam assumenda vero sunt, quam adipisci porro ipsa doloremque corrupti necessitatibus veniam, fugiat vitae voluptate tempore mollitia dolores molestias impedit quaerat dolorem architecto? Magnam libero beatae provident harum corporis.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div id="details">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Seller</th>
                                <td>John Doe</td>
                            </tr>
                            <tr>
                                <th>Initial price</th>
                                <td>Php 175.00</td>
                            </tr>
                            <tr>
                                <th>Upload date</th>
                                <td>January 1, 1970</td>
                            </tr>
                            <tr>
                                <th>View count</th>
                                <td>528 times</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="history">
                    <div class="timeline-card">
                        <table>
                            <tr>
                                <td><div class="bid-date">June 12, 2018</div></td>
                                <td><div class="end-sprite"></div></td>
                                <td><div class="bid-amount">Php 275.00</div></td>
                                <td><div class="bidder"><a href="#">c-collamar</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="bid-date">June 10, 2018</div></td>
                                <td><div class="connector-sprite"></div></td>
                                <td><div class="bid-amount">Php 240.00</div></td>
                                <td><div class="bidder"><a href="#">AustinZuniga</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="bid-date">December 27, 2017</div></td>
                                <td><div class="start-sprite"></div></td>
                                <td><div class="bid-amount">Php 206.00</div></td>
                                <td><div class="bidder"><a href="#">userm83x</a></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else display404(); ?>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/view_item.js"></script>
</body>
</html>