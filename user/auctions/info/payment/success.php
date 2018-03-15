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

if ($result['responseEnvelope']['ack'] == "Success" && $result['status'] == "COMPLETED") {
  echo 'Payment completed';

} else {
  echo 'Handle payment execution failure';
}

$deal_id = $_GET['id'];


$sql1 = "UPDATE augeo_application.deal set confirmation = 2 WHERE deal_id = $deal_id";
$result1 = $conn->query($sql1);
  header("Location: http://localhost/augeo/user/auctions/info_winner/success_transac.php?id=$deal_id");
