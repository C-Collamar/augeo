<?php include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.html");
?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">

<body>
<!-- Login form -->
<div class="container login_form" align="center">

     <h2>Login to AUGEO</h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">

      <input type="text" class="input-group" name="uname" id="uname" placeholder="Enter Username" required>
    </div>
    <div class="form-group">

      <input type="password" class="input-group" name="pass" id="pass" placeholder="Enter Password" required>
       <div id ="error_msg" class="error_msg">
</div>
    </div>

    <input type="button" class="btn btn-md" name="submit" id="submit" value="Login">
    <div id="forgot_pass"><a href="#" class="show_hide2"> Forgot Password</a></div>
<a href="#" class="show_hide">Sign Up</a><br />
  </form>
</div>




<!-- Password Reset FOrm-->
<div class="container email_d" align="center">

     <h2>To reset your password, Enter your Email :</h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="email" class="input-group" name="email" id="email" required placeholder="Enter Email">
       <div id="error_email" class="error_email""><p></p>
</div>
    </div>
    <input type="button" class="btn btn-default" name="send_mail" id="send_mail" value="send">
  </form>
</div>


<!-- Create Form -->
<div class="container crt_form" align="center">

     <h2>Create a New Account</h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="text" class="input-group" name="crt_uname" id="crt_uname" placeholder="Username" required>
      <input type="password" class="input-group" name="crt_pass" id="crt_pass" placeholder="Password" required>
        <div id="uname_error" class="uname_error"></div>
</div>

    <input type="button" name="crt_acc" id="crt_acc" value="Create account"><br>
     <a href="#" class="show_hide">Already have an account? Log in</a><br />
  </form>
</div>

<!-- Email success -->
<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Email Sent!</h4>
                </div>
                <div class="modal-body">
                    <h2 align="center"> Please check your Email to reset your password</h2>
                </div>
            </div>
        </div>
    </div>

 <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>