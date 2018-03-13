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

$bid_id = $_GET['id'];
$sql = "SELECT * FROM augeo_application.bid,augeo_application.deal,augeo_user_end.user WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id  AND augeo_application.bid.user_id = augeo_user_end.user.user_id AND augeo_application.deal.bid_id = $bid_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$deal_id = $row['deal_id'];
$full_name = $row['f_name'].' '.$row['m_name'].' '.$row['l_name'];
$confirmation = $row['confirmation'];
if($confirmation == 0)
    $confirmation = "Not Yet Confirmed by the buyer";
elseif($confirmation == 1)
    $confirmation = "Confirmed by the buyer";
else
    header("Location: success_transac.php?id=$bid_id");
?>





    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['account_id']; ?>">
    <div class="container-fluid">
        <div class="row">
            <br>

                <div class="container-fluid">
                <div class="well">
                    <h1>Order #<?php echo $deal_id; ?> </h1>
                    <p><h3> Status: <?php echo $confirmation; ?> </h3><br>

        
                    <h4>Your Item has already been ordered by  <a href="http://localhost/augeo/view_profile/?id=<?php echo $row['account_id']; ?>"><?php echo $full_name; ?></a>. Please wait till the buyer confirms his purchase. If the Buyer was not able confirm his purchase, his order will automatically be void thus your Item will be re-Auction. </h4>

                    </p><br><br>
                    <h4> </h4>

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