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
<form>



<div id="login_form" class="login_form">

    <div id ="error_msg" class="error_msg">
<p> Username or Password is incorrect </p><br>
</div>

<label id="uname"> Username: </label>
<input type="text" name="uname" id="uname" required><br>

<label id="uname"> Password: </label>
<input type="text" name="uname" id="uname" required><br>

<input type="submit" name="submit" id="submit" value="Login">
<br>
<a href="Password_reset/"> Forgot Password</a>
</form>
</div>
 <script src="../global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>