<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";
    include $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
	//require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
if(isset($_GET['new'])){
  echo '<input type="hidden" name="new_user" id="new_user" value="1">';
}
	 ?>
<input type="hidden" name="account_id_session" id="account_id_session" value="<?php echo $account_id_session; ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div id="tree"></div>
			</div>


			<div class="col-sm-9">
				<div class="container-fluid">

<div id="profile">
	<div class="well size">
<h2>Personal Information</h2>
<hr>
<label for="img">Profile picture</label><br>
<img src="" id="img"><br>
<a class="edit" data-toggle="collapse" href="#collapse1">edit</a>
<div id="collapse1" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item">  <input type="file" id="file" name="file" onchange="display_img(this);" />         </li>


      </ul>
      <div id="error_pic"></div>
    <div class="panel-footer">  <input type="button" name="but_upload" value="Save" id="but_upload"></div>
</div>


<hr>





<h4>Name:</h4>
        <label for="uname">First name</label>
        <input class="form-control" type="text" name="uname" id="uname" placeholder="First Name" >
         <label for="mname">Middle name</label>
        <input type="text" class="form-control" name="uname" id="mname" placeholder="Middle Name" >
        <label for="lname">Last name</label>
        <input type="text" class="form-control" name="uname" id="lname" placeholder="Last Name" >



<hr>
<label for="birthday">Birthday</label>
<input type="date" class="form-control" name="birthday" id="datepicker" placeholder="Birthday" >

<hr>
<label for="contact_no">contact</label>
<input type="number" class="form-control" name="contact_no" id="contact_no">
<hr>
<h4>Address</h4>
<label for="contact_no">Full Address</label>
<input type="text" class="form-control" name="address" id="address">

<label for="contact_no">zipcode</label>
<input type="text" class="form-control" name="zipcode" id="zipcode">
<hr>
<div id="save_changes_profile_error"></div>
<input type="button" class="form-control" name="save_changes_profile" id="save_changes_profile" value="Save Changes">

</div>


</div>
</div>



<!--ACCOUNT SIDEBAR-->
<div class="col-sm-9">
				<div class="container-fluid">

<div id="accounta">
<div class="well">
<h2>Login</h2>
<h3>Change Password:</h3>

<label for="current_pass">Enter Current Password</label><br>
<input type="password" class="form-control" name="current_pass" id="current_pass"></br>
<label for="new_pass1">Enter New Password</label><br>
<input type="password" class="form-control" name="new_pass1" id="new_pass1" ></br>
<label for="new_pass2">Re-enter New Password</label><br>
<input type="password" class="form-control" name="new_pass2" id="new_pass2"></br>
<div id="error_new_pass"></div>
<hr>
<input type="button" name="new_pass_btn" id="new_pass_btn" value="save">
</div>


<div class="well">
<div class="row">
<label for="username">Username:</label>
<div id="username" class="username"></div>
</div>

<div>
<hr>


<label for="email">Email</label>
<input type="email" class="form-control" name="email" id="email" >
<div id="error_email"></div>
<hr>
<input type="button" class="form-control" name="email_btn" id="email_btn" value="Save Changes">

</dvi>

</div>

</div>
<div class="well">
    <label for="Deactivate_btn"> Deactivate Account</label><br>
    <p>Deactivating your Account will disable your profile. Your information will not be viewed by other users. before proceeding please read about our policy
    <a href="http://localhost/augeo/global/php/faq.html"> here </a><br></p>
    <a class="deactivate_btn" data-toggle="collapse" href="#collapse3" name="deactivate_btn" id="deactivate_btn">Deactivate Account</a>
    <div id="collapse3" class="panel-collapse collapse">

      <ul class="list-group">
        <li class="list-group-item">  Please Enter your Password to proceed      </li>
        <label for="deac_pass1"> Password</label>
        <li class="list-group-item">  <input type="password" name="deac_pass1" id="deac_pass1" class="form-control" />         </li>
         <label for="deac_pass1">Re-enter Password</label>
        <li class="list-group-item">  <input type="password" name="deac_pass2" id="deac_pass2" class="form-control" />         </li>
        <div id="deactivate_error"></div>
        <li class="list-group-item">  <input type="button" name="deactivate" id="deactivate" value="Deactivate Account" class="deactivate" onclick="return(YNconfirm());"/>         </li>


      </ul>

  </div>
</div>
</div>










</div>
</div>

<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="center">WELCOME TO AUGEO</h4>
                </div>
                <div class="modal-body">
                    <h2 align="center"> You can update your profile here. Thank you for joining AUGEO!</h2>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
  <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
  <script src="js/index.js"></script>
</html>