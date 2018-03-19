<?php
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/parent_admin/pages/transactions";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";



$bid_id = $_GET['id'];
$sql = "SELECT * FROM augeo_application.bid,augeo_application.deal,augeo_user_end.user,augeo_user_end.item WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id  AND augeo_application.bid.user_id = augeo_user_end.user.user_id AND augeo_application.bid.item_id = augeo_user_end.item.item_id AND augeo_application.deal.deal_id = $bid_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if($row['confirmation'] == 0){
    $confirm= '<p style="color: red">NOT YET CONFIRMED BY THE CUSTOMER </p>';

}
elseif ($row['confirmation'] == 1) {
    $confirm= '<p style="color: GREEN">CONFIRMED BY THE CUSTOMER</p>';
}
else{
    $confirm= '<p style="color: green">ALREADY PAID</p>';
}

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
    $item_id = $row['item_id'];

    $sql1 = "SELECT * FROM augeo_user_end.item_img WHERE augeo_user_end.item_img.item_id = $item_id";
    $result1 = $conn->query($sql1);
    while($row1 = $result1->fetch_assoc()){

        $image = $row1['img_path'];
    }

?>

<!DOCTYPE html>
<html>
<head>  
    <title>Auctions Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link href="css/index.css" rel="stylesheet">
    </head>
<body>

    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['account_id']; ?>">
    <div class="container-fluid">
    <ol class="breadcrumb">
                <li><a href="http://localhost/augeo/admin">Dashboard</a></li>
                <li><a href="http://localhost/augeo/admin/parent_admin/pages/transactions">Transactions</a></li>
                <li class="active">Info</li>
            </ol>
<div class="container">
    <div class="row">
        <div class="well col-md-9">
             <div class="text-center">
                    <i><h2>Transaction Details</h2></i>
                </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <p>
                        <h4><em>Transaction #<?php echo $deal_id; ?></em></h4>
                    </p>    
                     <p>
                        <b><em>Date: <?php echo $time; ?></em></b>
                    </p>
                    
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <b><em> <?php echo $full_name; ?></em></b><br>
                        <b><em>Address:</em></b>
                        
                        <?php echo $full_address; ?>
                        
                        <br>
                        <b><em>CP#:</abbr> <?php echo $contact_no; ?></em></b>

                   
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
                            <td class="col-md-9">
                                <img src="<?php echo $image; ?>" height="100px" width="100px"><br>
                                <em><?php echo $name;?></em>

                            </td>
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
             <div>
             <p style="font-size: 17px">STATUS: <?php echo $confirm; ?></p>
         </div>
        </div>
    </div>


    </div>
</div>
    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="http://localhost/augeo/admin/vendors/morris/morris.css">
        <script src="   http://localhost/augeo/admin/vendors/raphael-min.js"></script>
        <script src="http://localhost/augeo/admin/vendors/morris/morris.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>