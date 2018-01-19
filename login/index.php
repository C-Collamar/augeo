<?php
if(isset($_SESSION['account_id'])){
  header("location: ../home/account/");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">

<body>
<?php
if(isset($_GET['activated'])){
  echo '<input type="hidden" name="activated" id="activated" value="1">';
}
?>

<!-- Login form -->
<div class="container login_form">
  <div align="center">
  <img src="http://localhost/augeo/global/img/logo.png" id="brand-logo1">
   <h3>Sign in to Augeo</h3>
   </div>
<div class="panel-login">

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control" name="uname" id="uname" required>

  </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="pass" id="pass" required>
        <span class="help-block" id ="error_msg"></span>

    </div>

    <input type="button" class="btn btn-md" name="submit" id="submit" value="Login">
    <div id="forgot_pass"><a href="#" class="show_hide2"> Forgot Password</a></div>
<a href="#" class="show_hide">Sign Up</a><br />
  </form>
</div>
</div>




<!-- Password Reset FOrm-->
<div class="container email_d" >
  <div align="center">
   <img src="http://localhost/augeo/global/img/logo.png" id="brand-logo1">
  <h3>Recover Account</h3>
     </div>
<div class="panel-login">

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Enter your Email</label>
      <input type="email" class="input-group" name="email" id="email">
       <span class="help-block" id ="error_email"></span>

    </div>
    <input type="button" class="btn btn-default" name="send_mail" id="send_mail" value="send">
  </form>
</div>
</div>

<!-- Create Form -->
<div class="container crt_form">
  <div align="center">
   <img src="http://localhost/augeo/global/img/logo.png" id="brand-logo1">
   <h3>Create a New Account</h3>
   </div>
<div class="panel-login">

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control" name="crt_uname" id="crt_uname"   required>
      <label>Password</label>
      <input type="password" class="form-control" name="crt_pass" id="crt_pass" required>
   <span class="help-block" id="uname_error"></span>
</div>

    <input type="button" name="crt_acc" id="crt_acc" value="Create account"><br>
     <a href="#" class="show_hide">Already have an account? Log in</a><br />
  </form>
</div>
</div>

<!-- Email success -->
<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="center">Email Sent!</h4>
                </div>
                <div class="modal-body">
                    <h2 align="center"> Please check your Email to reset your password</h2>
                </div>
            </div>
        </div>
    </div>
<!--Activated Account-->
    <div id="activated_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="center">Account has been Activated!</h4>
                </div>
                <div class="modal-body">
                    <h2 align="center"> To continue, Please login</h2>
                </div>
            </div>
        </div>
    </div>

 <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>