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
$sql = "SELECT * FROM augeo_application.bid,augeo_application.deal,augeo_user_end.user,augeo_user_end.item WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id  AND augeo_application.bid.user_id = augeo_user_end.user.user_id AND augeo_application.bid.item_id = augeo_user_end.item.item_id AND augeo_application.deal.bid_id = $bid_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$deal_id = $row['deal_id'];
$full_name = $row['f_name'].' '.$row['m_name'].' '.$row['l_name'];
$confirmation = $row['confirmation'];
$full_address = $row['full_address'];
$contact_no = $row['contact_no'];
$time = $row['timestamp'];
$name = $row['name'];
$amount = $row['amount'];
$tax = $amount * .05;
$subtotal = $amount - $tax;
?>





    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['account_id']; ?>">
    <div class="container-fluid">
      <br>
<div class="container">
    <div class="row">

        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
             <div class="text-center">
                    <h1>Transaction Details</h1>
                </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">

                    <address>
                        <strong>Address:</strong>
                        <br>
                        <?php echo $full_address; ?>
                        
                        <br>
                        <abbr title="Phone">CP#:</abbr> <?php echo $contact_no; ?>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo $time; ?></em>
                    </p>
                    <p>
                        <em>Transaction #: <?php echo $deal_id; ?></em>
                    </p>
                </div>
            </div>
            <div class="row">
               
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th></th>
                            <th class="text-center"></th>
                            <th class="text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $name;?></em></h4></td>
                            <th></th>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">Php <?php echo $amount; ?></td>
                        </tr>


                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal:</strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>Php <?php echo $subtotal; ?>.00</strong>
                            </p>
                            <p>
                                <strong>Php <?php echo $tax; ?>.00</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>Php<?php echo $amount;?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </td>
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