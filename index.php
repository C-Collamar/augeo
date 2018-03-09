<?php
session_start();

if(isset($_SESSION['account_id'])) {
    $account_id_session = $_SESSION['account_id'];
}

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";
// test: cookies
// if cookies is set then user is always logged in
if(isset($_COOKIE['account_id'])){
        $_SESSION['account_id'] = $_COOKIE['account_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
<body>

<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_now_accepting_pp_2line_w.png" border="0" alt="Now Accepting PayPal"></a><div style="text-align:center"></div></td></tr></table><!-- PayPal Logo -->


</body>
<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
</html>