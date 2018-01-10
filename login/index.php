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

<div id="login_form" class="login_form">
<form  method="post" enctype="multipart/form-data">
    <div id ="error_msg" class="error_msg">
<p>  </p><br>
</div>
<!-- Login form -->
 <h1>Login to AUGEO</h1>
<input type="text" name="uname" id="uname" placeholder="Enter Username" required><br>
<input type="password" name="pass" id="pass" placeholder="Enter Password" required><br>
<input type="button" name="submit" id="submit" value="Login">
<br>

<div id="forgot_pass" class="forgot_pass"><a href="Password_reset/"> Forgot Password</a></div>
<a href="#" class="show_hide">Sign Up</a><br />
</form>
</div>

<!-- Create form -->
<div id="crt_form" class="crt_form">
    <h1>Create a New Account</h1>
    <input type="text" name="crt_uname" id="crt_uname" placeholder="Username" required><br>
    <input type="password" name="crt_pass" id="crt_pass" placeholder="Password" required><br>
    <input type="button" name="crt_acc" id="crt_acc" value="Create account"><br><br>
    <a href="#" class="show_hide">Already have an account? Log in</a><br />

</div>


 <script src="../global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>