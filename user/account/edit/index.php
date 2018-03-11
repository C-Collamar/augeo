<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
	<link rel="stylesheet" href="css/edit.css">
</head>

<body>
	<?php
		require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
		require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";
		require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";

		//fetch all of user information
		$result = mysqli_query($conn, "SELECT * FROM augeo_user_end.user,augeo_user_end.user_account WHERE augeo_user_end.user.account_id = augeo_user_end.user_account.account_id AND augeo_user_end.user.account_id = ".$_SESSION['account_id']);
		$user = mysqli_fetch_array($result);

		if(isset($_GET['new'])){
			echo '<input type="hidden" name="new_user" id="new_user" value="1">';
		}
	?>
	<input type="hidden" name="account_id_session" id="account_id_session" value="<?php echo $account_id_session; ?>">
	<div style-"margin-top: 15px">
		<!-- LEFT SIDE -->
		<div id="tree-view">
			<div id="tree"></div>
		</div>
		<div id="content-wrapper">
			<div id="content">
				<div id="profile">
					<div class="well size">
						<form action="php/update_profile.php" method="POST" enctype="multipart/form-data">
							<h2>Edit Profile Information</h2><hr>
							<label for="profile-img">Profile picture</label><br>
							<img src="<?php echo $user['profile_img'] ?>" id="profile-img"><br>
							<input type="hidden" name="update_profile" id="update_profile" value="<?php echo $account_id_session; ?>">
							<input type="file" accept="image/jpeg" name="profile_img">
							<hr>
							<h4>Name</h4>
							<label for="uname">First name</label>
							<input class="form-control" type="text" name="f_name" id="uname" value="<?php echo $user['f_name'] ?>">
							<label for="mname">Middle name</label>
							<input type="text" class="form-control" name="m_name" id="mname" value="<?php echo $user['m_name'] ?>">
							<label for="lname">Last name</label>
							<input type="text" class="form-control" name="l_name" id="lname" value="<?php echo $user['l_name'] ?>">
							<hr>
							<label for="birthday">Birthday</label>
							<input type="date" class="form-control" name="birthday" value="<?php echo $user['bdate']?>">
							<hr>
							<label for="contact_no">contact</label>
							<input type="text" class="form-control" name="contact_no" id="contact_no" value="<?php echo $user['contact_no'] ?>">
							<hr>
							<h4>Address</h4>
							<label for="contact_no">Full Address</label>
							<input type="text" class="form-control" name="address" id="address" value="<?php echo $user['full_address'] ?>">

							<label for="contact_no">zipcode</label>
							<input type="number" class="form-control" name="zipcode" id="zipcode" value="<?php echo $user['zip_code'] ?>">
							<hr>
							<div id="save_changes_profile_error"></div>
							<input type="submit" class="btn-blue" name="save_changes_profile" id="save_changes_profile" value="Save Changes">
							<a href="../../account" class="cancel-btn">Cancel</a>
						</form>
					</div>
				</div>

				<!--ACCOUNT SIDEBAR-->
				<div id="account" style="display: none;">
					<div class="well">
						<h2>Login</h2>
						<h3>Change Password:</h3>
						<label for="current_pass">Enter Current Password</label>
						<br>
						<input type="password" class="form-control" name="current_pass" id="current_pass">
						</br>
						<label for="new_pass1">Enter New Password</label>
						<br>
						<input type="password" class="form-control" name="new_pass1" id="new_pass1">
						</br>
						<label for="new_pass2">Re-enter New Password</label>
						<br>
						<input type="password" class="form-control" name="new_pass2" id="new_pass2">
						</br>
						<div id="error_new_pass"></div>
						<hr>
						<input type="button" class="btn-blue" name="new_pass_btn" id="new_pass_btn" value="save">
					</div>
					<div class="well">
						<div>
							<hr>
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
							<div id="error_email"></div>
							<hr>
							<input type="button" class="btn-blue" name="email_btn" id="email_btn" value="Save Changes">
						</div>
					</div>
					<!-- DEACTIVATION ZONE -->
					<div class="hr-sect" style="color: #a53a41">DANGER ZONE</div>
					<div class="well" style="padding: 15px">
						<label for="Deactivate_btn"> Deactivate Account</label>
						<br>
						<p>
							Deactivating your account will disable your access to this site. Your information however will be kept safe
							with us and will not be viewed by other users. You can still activate your account whenever you want. For
							further information, please read our guide <a href="http://localhost/augeo/global/php/faq.html">here</a>.
						</p>
						<a class="deactivate_btn" data-toggle="collapse" href="#collapse3" name="deactivate_btn" id="deactivate_btn">Deactivate Account</a>
						<div id="collapse3" class="panel-collapse collapse">
							<ul class="list-group">
								<li class="list-group-item">Please Enter your Password to proceed</li>
								<label for="deac_pass1"> Password</label>
								<li class="list-group-item">
									<input type="password" name="deac_pass1" id="deac_pass1" class="form-control" />
								</li>
								<label for="deac_pass1">Re-enter Password</label>
								<li class="list-group-item">
									<input type="password" name="deac_pass2" id="deac_pass2" class="form-control" />
								</li>
								<div id="deactivate_error"></div>
								<li class="list-group-item">
									<input type="button" name="deactivate" id="deactivate" value="Deactivate Account" class="btn btn-danger" onclick="return(YNconfirm());">
								</li>
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
	</div>

	<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/edit.js"></script>
</body>
</html>