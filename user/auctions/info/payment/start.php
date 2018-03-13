<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";

$account_id = $_SESSION['account_id'];
$deal_no = $_GET['deal_id'];
$sql = "SELECT * FROM augeo_application.bid,augeo_application.deal,augeo_user_end.item,augeo_user_end.item_img WHERE augeo_application.bid.bid_id = augeo_application.deal.bid_id AND  augeo_user_end.item_img.item_id = augeo_user_end.item.item_id AND augeo_application.deal.deal_id = $deal_no";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$amount = $row['amount'];
$percent = $amount * .05;
$amount = $amount - $percent;

$sql1 = "SELECT * FROM augeo_user_end.user WHERE augeo_user_end.user.account_id = $account_id";
$result1 = $conn->query($sql1);
$email = $result1->fetch_assoc();







$paypal = new PayPal($config);

$result = $paypal->call(
  array(
    'actionType'  => 'PAY',
    'currencyCode'  => 'PHP',
    'feesPayer'  => 'EACHRECEIVER',
    'memo'  => 'Order number #'.$deal_no,

    'cancelUrl' => ' /cancel.php',
    'returnUrl' => ' /success.php?id='.$deal_no,

    'receiverList' => array(
      'receiver' => array(
        array(
          'amount'  => $amount,
          'email'  => $email['email'],
        ),
        array(
          'amount'  => $percent,
          'email'  => 'augeowebsite@gmail.com',
        ),
      ),
    ),
  ), 'Pay'
);

if ($result['responseEnvelope']['ack'] == 'Success') {
  $_SESSION['payKey'] = $result["payKey"];
  $paypal->redirect($result);
} else {
  echo 'Handle the payment creation failure';
}
