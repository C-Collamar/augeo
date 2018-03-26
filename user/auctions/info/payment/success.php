<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
    'actionType'  => 'Pay',
    'payKey'  => $_SESSION['payKey'],
  ), "PaymentDetails"
);
$deal_id = $_GET['id'];
$amount = $_GET['amount'];

if ($result['responseEnvelope']['ack'] == "Success" && $result['status'] == "COMPLETED") {
  echo 'Payment completed';
  $sql = "INSERT INTO augeo_application.transaction_paypal (transaction_id,deal_id,total_amount) VALUES('','$deal_id','$amount')";
  $result = $conn->query($sql);
  echo mysqli_error($conn);
  header("Location: http://localhost/augeo/user/auctions/info_winner/success_transac.php?id=$deal_id");

} else {
  echo 'Handle payment execution failure';
}




$sql1 = "UPDATE augeo_application.deal set confirmation = 2 WHERE deal_id = $deal_id";
$result1 = $conn->query($sql1);
  header("Location: http://localhost/augeo/user/auctions/info_winner/success_transac.php?id=$deal_id");
