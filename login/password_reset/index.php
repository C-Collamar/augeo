<?php
include("../../global/php/topbar.html");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="../../global/css/topbar.css">
<link rel="stylesheet" href="../../global/vendor/bootstrap/dist/css/bootstrap.min.css">

<body>
<form id="email_form" action="php/password_reset.php" method="POST">
<div id="email_d" class="email_d">



<div class="page_header" >To reset your password, Enter your Email :<br></div><br>
<input type="email" name="email" id="email" required placeholder="Enter Email"><br>
 <?php
if (isset($_GET['error'])){
    echo '
<div id="error_email" class="error_email">

    <p>Email not Found in database</p>

</div>

    ';
}
elseif (isset($_GET['success'])) {
    echo '

    ';
}
 ?>
<input type="submit" name="submit" id="submit" value="submit">
</div>






</form>
<script src="../../global/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

