<?php
include("../../global/php/topbar.html");

if(!isset($_GET['aassmmss'])){
    header("Location: ../../global/php/page_error.php");
}
else{
    include("php/hide.php");
}
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
    <div class="header" id="header">Recover Account</div>
   <div id="hello_user" class="hello_user"></div>

     <form name="c_Form" id="c_Form" method="POST" action="php/change_pass.php" onsubmit="return validateForm()">
        <input type="hidden" name="hidden" id="hidden" value="<?php echo $id; ?>">
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