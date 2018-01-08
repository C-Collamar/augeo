<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<link rel="stylesheet" href="css/index.css" />
<body>
<form id="email_form" action="php/password_reset.php" method="POST">
<div id="email_d" class="email_d">
    <?php
if (isset($_GET['error'])){
    echo '
<div id="error_email" class="error_email">

    <p>Email not Found in database</p>

</div>

    ';
}
    ?>

<label>Enter Email:<br></label>
<input type="email" name="email" id="email" required><br>
<input type="submit" name="submit" id="submit" value="submit">
</div>
</form>

</body>
</html>

