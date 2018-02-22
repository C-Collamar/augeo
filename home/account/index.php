<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
	<link rel="stylesheet" href="../../global/css/default.css">
	<link rel="stylesheet" href="css/account.css">
</head>

<body>
	<?php
		require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";
		require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
		require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";
		require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";

		//get user profile and account information
		$result = mysqli_query($conn,
			"SELECT ".
				"augeo_user_end.user.*, ".
				"augeo_user_end.user_account.username ".
			"FROM ".
				"augeo_user_end.user, ".
				"augeo_user_end.user_account ".
			"WHERE ".
				"augeo_user_end.user.account_id = augeo_user_end.user_account.account_id AND ".
				"augeo_user_end.user.account_id = $account_id_session"
		);

		if($result) {
			$user = mysqli_fetch_array($result);
			$sex = $user['sex'] == 0? 'Male' : 'Female';
			$email = decode($user['email']);
			$f_name = decode($user['f_name']);
			$m_name = decode($user['m_name']);
			$l_name = decode($user['l_name']);
			$username = decode($user['username']);
			$zip_code = decode($user['zip_code']);
			$contact_no = decode($user['contact_no']);
			$profile_img = decode($user['profile_img']);
			$cover_photo = decode($user['cover_photo']);
			$full_address = decode($user['full_address']);
			$age = (new DateTime())->diff(new DateTime($user['bdate']))->format('%y');
		}
		else {
			die("Query error: ".mysqli_error($conn));
		}


		if(isset($_GET['new'])){
			echo '<input type="hidden" name="new_user" id="new_user" value="1">';
		}
	?>
	<input type="hidden" name="account_id_session" id="account_id_session" value="<?php echo $account_id_session; ?>">
	<div class="container-fluid">
		<div class="row" style="padding-top: 15px">
			<!-- LEFT SIDE -->
			<div class="col-sm-3">
				<div id="tree"></div>
			</div>
			<!-- RIGHT SIDE -->
			<div class="col-sm-9">
				<div id="profile">
					<!-- PROFILE OPTIONS -->
					<div id="profile-options">
						<a href="edit/#profile" class="btn btn-default">Edit Profile</a>
					</div>
					<!-- PROFILE OVERVIEW -->
					<div class="profile-content">
						<div id="cover-photo-wrapper">
							<img id="cover-photo" class="pannable" src="<?php echo  'http://localhost/augeo/data/user/cover_photo/'.$cover_photo ?>" alt="Cover photo">
						</div>
						<img id="profile-img" src="<?php echo  'http://localhost/augeo/data/user/profile_img/'.$profile_img ?>" alt="Profile picture">
						<div id="profile-overview">
							<div id="name"><?php echo $f_name.' '.substr($m_name, 0, 1).'. '.$l_name ?></div>
							<div id="augeo-user-since"><i>a</i> months</div>
							<div id="items-auctioned"><i>b</i></div>
							<div id="items-bid"><i>c</i></div>
						</div>
					</div>
					<!-- BASIC INFORMATION -->
					<div class="hr-sect">BASIC INFORMATION</div>
					<div class="profile-content">
						<table>
							<tr>
								<th>Age</th>
								<td><?php echo $age ?> years old</td>
							</tr>
							<tr>
								<th>Birthday</th>
								<td><?php echo date('F j, Y', strtotime('1998-04-03')); ?></td>
							</tr>
							<tr>
								<th>Gender</th>
								<td><?php echo $sex ?></td>
							</tr>
						</table>
					</div>
					<!-- CONTACT INFORMATION -->
					<div class="hr-sect">CONTACT INFORMATION</div>
					<div class="profile-content">
						<table>
							<tr>
								<th>Contact number</th>
								<td><?php echo $contact_no ?></td>
							</tr>
							<tr>
								<th>Address</th>
								<td><a href="http://google.com/search?q=<?php echo str_replace(' ', '+', $full_address) ?>" target="_blank"><?php echo $full_address ?></a></td>
							</tr>
							<tr>
								<th>E-mail address</th>
								<td><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></td>
							</tr>
						</table>
					</div>
				</div>

				<!--ACCOUNT SIDEBAR-->
				<div id="account" style="display: none">
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
							<input type="email" class="form-control" name="email" id="email">
							<div id="error_email"></div>
							<hr>
							<input type="button" class="form-control" name="email_btn" id="email_btn" value="Save Changes">
						</div>
					</div>
				</div>
				<div class="well">
					<label for="Deactivate_btn"> Deactivate Account</label>
					<br>
					<p>Deactivating your Account will disable your profile. Your information will not be viewed by other users.
					Before proceeding, please read about our policy<a href="http://localhost/augeo/global/php/faq.html"> here </a><br>
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
								<input type="button" name="deactivate" id="deactivate" value="Deactivate Account" class="deactivate" onclick="return(YNconfirm());">
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/account.js"></script>
</body>
</html>