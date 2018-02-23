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
	<div style="margin-top: 15px">
		<!-- LEFT SIDE -->
		<div id="tree-view">
			<div id="tree"></div>
		</div>
		<div id="content-wrapper">
			<!-- RIGHT SIDE -->
			<div id="content">
				<div id="profile">
					<!-- PROFILE OPTIONS -->
					<div style="padding-bottom: 10px">
						<h4 style="display: inline">Profile Information</h4>
						<a href="edit/#profile" style="margin-left: 10px">Edit</a>
					</div>
					<!-- PROFILE OVERVIEW -->
					<div class="content-card">
						<div id="cover-photo-wrapper">
							<img id="cover-photo" class="pannable" src="<?php echo 'http://localhost/augeo/data/user/cover_photo/'.$cover_photo ?>" alt="Cover photo">
						</div>
						<img id="profile-img" src="<?php echo 'http://localhost/augeo/data/user/profile_img/'.$profile_img ?>" alt="Profile picture">
						<div id="profile-overview">
							<div id="name"><?php echo $f_name.' '.substr($m_name, 0, 1).'. '.$l_name ?></div>
							<div id="augeo-user-since"><i>?</i> months</div>
							<div id="items-auctioned"><i>?</i></div>
							<div id="items-bid"><i>?</i></div>
						</div>
					</div>
					<!-- BASIC INFORMATION -->
					<div class="hr-sect">BASIC INFORMATION</div>
					<div class="content-card">
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
					<div class="content-card">
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

				<!--ACCOUNT INFORMATION -->
				<div id="account" style="display: none">
					<!-- ACCOUNT OPTIONS -->
					<div style="padding-bottom: 10px">
						<h4 style="display: inline">Account Information</h4>
						<a href="edit/#account" style="margin-left: 10px">Edit</a>
					</div>
					<div class="content-card">
						<table>
							<tr>
								<th>Username</th>
								<td><?php echo $username ?></td>
							</tr>
							<tr>
								<th>Date joined</th>
								<td>January 1, 1970</td>
							</tr>
						</table>
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