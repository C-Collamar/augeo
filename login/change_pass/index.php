<?php
include("../../global/php/topbar.html");
include("php/hide.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>change password</title>
</head>
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="../../global/css/topbar.css">
<link rel="stylesheet" href="../../global/vendor/bootstrap/dist/css/bootstrap.min.css">
<body>





<div id=change_pass class="change_pass">
     <form name="c_Form" id="c_Form" method="POST" onsubmit="return validateForm()">
<label for="c_pass"> New Password: </label><br>
<input type="password" name="c_pass" id="c_pass" placeholder="Enter new password" required"><br>

<label for="n_pass"> Re-enter Password: </label><br>
<input type="password" name="n_pass" id="n_pass"  placeholder="Re-enter password" required"><br>
<div id="error_msg" class="error_msg">
<p></p></div>
<input type="submit" name="submit" value="submit" >
</form>

</div>
<script src="../../global/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>


</body>
</html>