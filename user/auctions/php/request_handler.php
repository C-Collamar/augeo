<?php
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";


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

$sql12 = "SELECT MAX(amount) as bid_amount FROM augeo_application.bid WHERE augeo_application.bid.item_id = $item_id";
$result12 = $conn->query($sql12);
$amount = $result12->fetch_assoc();
if($amount['bid_amount'] == "")
    $amount['bid_amount'] = 0;

 echo '<a class="row card-item">
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
                        <input type="submit" class="btn btn-green" value="End Auction">
                        </form>
                    </div>
                </div>
            </div>
        </a><br>';
}
}
}



elseif($_GET['node_id'] == 2) {
   echo  '<a class="row card-item">
                        <div class="col-sm-7 border-right">
                            <div class="media">
                                <div class="media-left">
                                    <img src="http://localhost/augeo/data/user/profile_img/0.png" class="media-object item-img" title="Sample item description.">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Item name</h4>
                                    <span class="item-seller">Christian A. Collamar</span>
                                    <div class="w-100"></div>
                                    <span class="bidders-participated">5</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center align-middle">
                            <div class="row no-padding">
                                <div class="col-xs-6">
                                    <div class="row no-padding your-bid"><h4>&#8369; 5.00</h4></div>
                                    <div class="row no-padding"><small>1 week ago</small></div>
                                </div>
                                <div class="col-xs-6">
                                <div class="row no-padding highest-bid"><h4>&#8369; 6.00</h4></div>
                                <div class="row no-padding"><small>3 days ago</small></div>
                                </div>
                            </div>
                        </div>
                    </a>';



}

if($_GET['node_id'] == 5){
$id = $_GET['id'];
$sql = "SELECT * FROM augeo_user_end.item INNER JOIN  augeo_user_end.item_img ON augeo_user_end.item_img.item_id  = augeo_user_end.item.item_id INNER JOIN augeo_user_end.user ON augeo_user_end.item.user_id = augeo_user_end.user.user_id  WHERE augeo_user_end.item.user_id = $id AND augeo_user_end.item.state = 1";
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
if($amount['bid_amount'] == "")
    $amount['bid_amount'] = 0;

 echo '<a class="row card-item">
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
                        <input type="submit" class="btn btn-green" value="Re-Auction">
                        </form>
                    </div>
                </div>
            </div>
        </a><br>';
}
}
}

if(isset($_POST['id'])){
$id = $_POST['id'];
$sql = "UPDATE augeo_user_end.item set augeo_user_end.item.state = 1 WHERE augeo_user_end.item.item_id = $id";
$result = $conn->query($sql);
header("Location: ../?msg=1");
}


if(isset($_POST['id_re'])){
$id = $_POST['id_re'];
$sql = "UPDATE augeo_user_end.item set augeo_user_end.item.state = 0 WHERE augeo_user_end.item.item_id = $id";
$result = $conn->query($sql);
header("Location: ../?msg=1");
}
?>



