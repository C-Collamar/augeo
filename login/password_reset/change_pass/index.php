<?php
include("../../../global/php/topbar.html");
?>
<!DOCTYPE html>
<html>
<head>
    <title>change password</title>
</head>
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="../../../global/css/topbar.css">
<link rel="stylesheet" href="../../../global/vendor/bootstrap/dist/css/bootstrap.min.css">
<body>
<?php
include("php/hide.php");
if(isset($id)){

echo '

 <form name="c_Form" id="c_Form" method="POST" action="" onsubmit="return validateForm()">
<div id=change_pass class="change_pass">
<label for="c_pass"> New Password: </label>
<input type="password" name="c_pass" id="c_pass" required"><br>

<label for="n_pass"> Re-enter Password: </label>
<input type="password" name="n_pass" id="n_pass" required"><br>
<div id="error_msg">
<p> </p>
</div>
<input type="submit" name="submit" value="submit">
</form>';

}
else{
    header("location: ../../../global/php/page_error.php");
}

 ?>

</div>
<script src="../../../global/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>


</body>
</html>