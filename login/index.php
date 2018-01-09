<?php include("../global/php/topbar.html");
?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="../global/css/topbar.css">
<link rel="stylesheet" href="../global/vendor/bootstrap/dist/css/bootstrap.min.css">

<body>
<form  method="post" enctype="multipart/form-data">
<div id="login_form" class="login_form">

    <div id ="error_msg" class="error_msg">
<p>  </p><br>
</div>


<input type="text" name="uname" id="uname" placeholder="Enter Username" required><br>


<input type="password" name="pass" id="pass" placeholder="Enter Password" required><br>

<input type="button" name="submit" id="submit" value="Login">
<br>

<div id="forgot_pass" class="forgot_pass"><a href="Password_reset/"> Forgot Password</a></div>
</form>
</div>
 <script src="../global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>