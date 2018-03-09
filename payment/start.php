<?php
session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$result = $paypal->call(
  array(
    'actionType'  => 'PAY',
    'currencyCode'  => 'PHP',
    'feesPayer'  => 'EACHRECEIVER',
    'memo'  => 'Order number #123',

    'cancelUrl' => ' /cancel.php',
    'returnUrl' => ' /success.php',

    'receiverList' => array(
      'receiver' => array(
        array(
          'amount'  => '100.00',
          'email'  => 'augeowebsite@gmail.com',
        ),
        array(
          'amount'  => '45.00',
          'email'  => 'us-provider2@commercefactory.org',
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
