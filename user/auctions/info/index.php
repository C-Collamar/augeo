<!DOCTYPE html>
<html>
<head>
    <title>Auctions Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php
    require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
    require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";

$item_id = $_GET['id'];
$sql = "SELECT * FROM augeo_application.bid,augeo_application.deal,augeo_user_end.item,augeo_user_end.item_img WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id AND  augeo_user_end.item_img.item_id = augeo_user_end.item.item_id AND augeo_application.bid.item_id = $item_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$due_date =  $row['due_date'];
$deal_id = $row['deal_id'];
$img_path = $row['img_path'];
$name = $row['name'];
if($row['confirmation'] == 1)
    header("Location: payment/?deal_id=$deal_id&id=$item_id");
?>





    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['account_id']; ?>">
    <div class="container-fluid">
        <div class="row">
            <br>

                <div class="container-fluid">
                <div class="well">
                    <h3>NOTICE TO AUCTION WINNERS </h3><br><br>
                    <p><h4>     Your Item <?php echo $name; ?>,</h4><br>

                    <img src="<?php echo $img_path; ?>">


                    </p><br><br>
                    <h4>You must confirm this purchase before <?php echo $due_date ?>. Failure to respond will void your Order</h4>
                    <form action="php/index.php" method="POST">
                    <input type="hidden" name="deal" id="deal" value="<?php echo $deal_id; ?>">
                    <input type="submit" class="btn btn-primary" name="confim" id="confirm" value="Confirm Order">
                    </form>
                </div>


                </div>
        </div>
    </div>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
    <script src="js/view.js"></script>
    <script src="js/home.js"></script>
</body>
</html>