<?php
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";

// FOR "ITEM YOU SELL IN AUCTION" SIDEBAR
if($_GET['node_id'] == 1){
    $id = $_GET['id'];
    $sql = "SELECT * FROM augeo_user_end.item INNER JOIN  augeo_user_end.item_img ON augeo_user_end.item_img.item_id  = augeo_user_end.item.item_id INNER JOIN augeo_user_end.user ON augeo_user_end.item.user_id = augeo_user_end.user.user_id  WHERE augeo_user_end.item.user_id = $id AND augeo_user_end.item.state = 0";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $item_id = $row['item_id'];
        $sql1 = "SELECT COUNT(bid_id) as bid_num FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
        $result1 = $conn->query($sql1);
        $bidders = $result1->fetch_assoc();

        $sql12 = "SELECT MAX(amount) as bid_amount,bid_id FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
        $result12 = $conn->query($sql12);
        $amount = $result12->fetch_assoc();

        if($amount['bid_amount'] == "")
            $amount['bid_amount'] = 0;

        $amount_winner = $amount['bid_amount']; 

        $sql123 = "SELECT bid_id from augeo_application.bid where augeo_application.bid.item_id = $item_id and augeo_application.bid.amount = $amount_winner";
        $result123 = $conn->query($sql123);
        $bid_id_winner = $result123->fetch_assoc();
            
         echo '<a class="row card-item" href="http://localhost/augeo/item/view/?id='.$item_id.'">
                    <div class="col-sm-7 border-right">
                        <div class="media">
                            <div class="media-left">
                                <img src="'.$row['img_path'].'"
                                    class="media-object item-img" title="'.$row['description'].'">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Item name: '.$row['name'].'</h4>
                                <div class="w-100"></div>
                                <span class="bidders-participated">'.$bidders['bid_num'].'</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center align-middle">
                        <div class="row no-padding vertical-align">
                            <div class="col-xs-6">
                                <div class="row no-padding highest-bid"><h4>&#8369; '.$amount['bid_amount'].'</h4></div>
                                <div class="row no-padding"><small>'.$row['timestamp'].'</small></div>
                            </div>
                            <div class="col-xs-6"><form action="php/request_handler.php" method="POST" onsubmit="return validate(this);">
                                <input type="hidden" value="'.$row['item_id'].'" id="id" name="id">
                                <input type="hidden" value="'.$bid_id_winner['bid_id'].'" id="bid_id" name="bid_id">
                                <input type="submit" class="btn btn-green" value="End Auction">
                                </form>
                            </div>
                        </div>
                    </div>
                </a><br>';
        }
        }
    else{
        echo '<h1 align="center">No Items</h1>';
    }
}

// FOR "ITEM YOU PARTICIPATE IN BIDDING" SIDEBAR
elseif($_GET['node_id'] == 2) {
    $id = $_GET['id'];

    $sql = "SELECT DISTINCT augeo_application.bid.user_id,augeo_user_end.item.item_id,augeo_user_end.item.name,augeo_user_end.user.f_name,augeo_user_end.user.m_name,augeo_user_end.user.l_name,augeo_user_end.item_img.img_path FROM augeo_application.bid,augeo_user_end.item,augeo_user_end.user,augeo_user_end.item_img WHERE augeo_user_end.item.item_id = augeo_application.bid.item_id AND augeo_user_end.item_img.item_id = augeo_user_end.item.item_id AND augeo_user_end.user.user_id = augeo_user_end.item.user_id AND augeo_application.bid.user_id = $id AND augeo_user_end.item.state = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $item_id = $row['item_id'];
            $sql1 = "SELECT COUNT(bid_id) as bid_num FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
            $result1 = $conn->query($sql1);
            $bidders = $result1->fetch_assoc();

            $sql12 = "SELECT MAX(amount) as bid_amount FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
            $result12 = $conn->query($sql12);
            $amount = $result12->fetch_assoc();

            $sql123 = "SELECT MAX(amount) as user_bid FROM augeo_application.bid WHERE augeo_application.bid.item_id=$item_id AND augeo_application.bid.user_id =$id";
            $result123 = $conn->query($sql123);
            $amount_user = $result123->fetch_assoc();

            if($amount['bid_amount'] == "")
                $amount['bid_amount'] = 0;

               echo  '<a class="row card-item" href="http://localhost/augeo/item/view/?id='.$item_id.'">
                                    <div class="col-sm-7 border-right">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="'.$row['img_path'].'" class="media-object item-img" title="Sample item description.">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">'.$row['name'].'</h4>
                                                <span class="item-seller">'.$row['f_name'].' '.$row['m_name'].'  '.$row['l_name'].'</span>
                                                <div class="w-100"></div>
                                                <span class="bidders-participated">'.$bidders['bid_num'].'</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center align-middle">
                                        <div class="row no-padding">
                                            <div class="col-xs-6">
                                                <div class="row no-padding your-bid"><h4>&#8369; '.$amount_user['user_bid'].'</h4></div>
                                                <div class="row no-padding"><small>1 week ago</small></div>
                                            </div>
                                            <div class="col-xs-6">
                                            <div class="row no-padding highest-bid"><h4>&#8369; '.$amount['bid_amount'].'</h4></div>
                                            <div class="row no-padding"><small>3 days ago</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </a><br>';
            }
    }
    else{
        echo '<h1 align="center">No Items</h1>';
    }
}

// FOR "YOU AS A BIDDER" SIDEBAR
elseif($_GET['node_id'] == 4) {
    $id = $_GET['id'];

    $sql = "SELECT DISTINCT augeo_application.deal.deal_id,augeo_application.bid.user_id,augeo_application.bid.item_id, augeo_user_end.item.name,augeo_user_end.item_img.img_path FROM augeo_application.bid,augeo_application.deal,augeo_user_end.item,augeo_user_end.item_img,augeo_user_end.user WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id AND augeo_application.bid.item_id = augeo_user_end.item.item_id AND augeo_user_end.item_img.item_id = augeo_user_end.item.item_id AND augeo_application.bid.user_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $item_id = $row['item_id'];

            $sql1 = "SELECT COUNT(bid_id) as bid_num FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
            $result1 = $conn->query($sql1);
            $bidders = $result1->fetch_assoc();

            $sql12 = "SELECT MAX(amount) as bid_amount FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
            $result12 = $conn->query($sql12);
            $amount = $result12->fetch_assoc();

            $sql123 = "SELECT MAX(amount) as user_bid FROM augeo_application.bid WHERE augeo_application.bid.item_id=$item_id AND augeo_application.bid.user_id =$id";
            $result123 = $conn->query($sql123);
            $amount_user = $result123->fetch_assoc();

            if($amount['bid_amount'] == "")
                $amount['bid_amount'] = 0;

            $sql1234 = "SELECT augeo_user_end.user.f_name,augeo_user_end.user.l_name,augeo_user_end.user.m_name FROM augeo_user_end.user,augeo_user_end.item WHERE augeo_user_end.item.user_id = augeo_user_end.user.user_id AND augeo_user_end.item.item_id =$item_id";
            $result1234 = $conn->query($sql1234);
            $seller_info = $result1234->fetch_assoc();

               echo  '<a class="row card-item" href="http://localhost/augeo/user/auctions/info/?id='.$item_id.'">
                                    <div class="col-sm-7 border-right">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="'.$row['img_path'].'" class="media-object item-img" title="Sample item description.">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">'.$row['name'].'</h4>
                                                <span class="item-seller">'.$seller_info['f_name'].' '.$seller_info['m_name'].'  '.$seller_info['l_name'].'</span>
                                                <div class="w-100"></div>
                                                <span class="bidders-participated">'.$bidders['bid_num'].'</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center align-middle">
                                        <div class="row no-padding">
                                            <div class="col-xs-6">
                                                <div class="row no-padding your-bid"><h4>&#8369; '.$amount_user['user_bid'].'</h4></div>
                                                <div class="row no-padding"><small>1 week ago</small></div>
                                            </div>
                                            <div class="col-xs-6">
                                            <div class="row no-padding highest-bid"><h4>&#8369; '.$amount['bid_amount'].'</h4></div>
                                            <div class="row no-padding"><small>3 days ago</small></div>
                                            </div>
                                        </div>
                                    </div>
                                </a><br>';
            }
}
    else{
        echo '<h1 align="center">No Items</h1>';
    }
}

// FOR "YOU AS THE SELLER" SIDEBAR
elseif($_GET['node_id'] == 5){
    $id = $_GET['id'];

    $sql = "SELECT * FROM augeo_user_end.item INNER JOIN  augeo_user_end.item_img ON augeo_user_end.item_img.item_id  = augeo_user_end.item.item_id INNER JOIN augeo_user_end.user ON augeo_user_end.item.user_id = augeo_user_end.user.user_id  WHERE augeo_user_end.item.user_id = $id AND augeo_user_end.item.state = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $item_id = $row['item_id'];
        $sql1 = "SELECT COUNT(bid_id) as bid_num FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
        $result1 = $conn->query($sql1);
        $bidders = $result1->fetch_assoc();
        $sql12 = "SELECT MAX(amount) as bid_amount,bid_id FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
        $result12 = $conn->query($sql12);
        $amount = $result12->fetch_assoc();

        if($amount['bid_amount'] == "")
            $amount['bid_amount'] = 0;

        $amount_winner = $amount['bid_amount']; 
        $sql123 = "SELECT bid_id from augeo_application.bid where augeo_application.bid.item_id = $item_id and augeo_application.bid.amount = $amount_winner";
        $result123 = $conn->query($sql123);
        $bid_id_winner = $result123->fetch_assoc();
        
         echo '<a class="row card-item" href="http://localhost/augeo/user/auctions/info_winner/?id='.$bid_id_winner['bid_id'].'">
                    <div class="col-sm-7 border-right">
                        <div class="media">
                            <div class="media-left">
                                <img src="'.$row['img_path'].'"
                                    class="media-object item-img" title="'.$row['description'].'">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Item name: '.$row['name'].'</h4>
                                <div class="w-100"></div>
                                <span class="bidders-participated">'.$bidders['bid_num'].'</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center align-middle">
                        <div class="row no-padding vertical-align">
                            <div class="col-xs-6">
                                <div class="row no-padding highest-bid"><h4>&#8369; '.$amount['bid_amount'].'</h4></div>
                                <div class="row no-padding"><small>'.$row['timestamp'].'</small></div>
                            </div>
                            <div class="col-xs-6"><form action="php/request_handler.php" method="POST" onsubmit="return validate(this);">
                                <input type="hidden" value="'.$row['item_id'].'" id="id_re" name="id_re">
                                <input type="hidden" value="'.$bid_id_winner['bid_id'].'" id="bid_id" name="bid_id">
                                <input type="submit" class="btn btn-green" value="Re-Auction">
                                </form>
                            </div>
                        </div>
                    </div>
                </a><br>';
        }
    }
    else{
    echo '<h1 align="center">No Items</h1>';
}
    }

// FOR ENDING AUCTION
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $bid_id = $_POST['bid_id'];

    $sql = "UPDATE augeo_user_end.item set augeo_user_end.item.state = 1 WHERE augeo_user_end.item.item_id = $id";
    $result = $conn->query($sql);

    $added_timestamp = strtotime('+5 day', time());
    $result_date = date('Y-m-d H:i:s', $added_timestamp);

    $sql1 = "INSERT INTO augeo_application.deal(deal_id,bid_id,confirmation,due_date) VALUES('','$bid_id',0,'$result_date')";
    $result1 = $conn->query($sql1);

    header("Location: ../?msg=1");
}
// FOR RE AUCTION
if(isset($_POST['id_re'])){
    $id = $_POST['id_re'];
    $bid_id = $_POST['bid_id'];

    $sql = "UPDATE augeo_user_end.item set augeo_user_end.item.state = 0 WHERE augeo_user_end.item.item_id = $id";
    $result = $conn->query($sql);

    $sql1 = "DELETE FROM augeo_application.deal WHERE bid_id = $bid_id";
    $result1 = $conn->query($sql1);

    header("Location: ../?msg=1");
}
?>
