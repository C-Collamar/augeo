<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

if(isset($_POST['uname']) && isset($_POST['pass'])){
	$username = encode($_POST['uname']);
	$password = encrypt(encode($_POST['pass']));

	// check if entered username and password is in the database
	$result = mysqli_query($conn,"SELECT * FrOm augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' AND augeo_user_end.user_account.password = '$password' ");
    if($row = mysqli_num_rows($result) == 1){
		$found = mysqli_fetch_array($result);

		if($found['state'] == 1){
			$account_id = $found['account_id'];
			setcookie("account_id", $account_id, time() + (86400 * 30), "/");
			$_SESSION['account_id'] = $account_id;
			mysqli_query($conn,"INSERT INTO augeo_application.user_logtime(user_id) VALUES ('$account_id') ");
			$_SESSION['log_id'] = mysqli_insert_id($conn);
			echo "sucess";
		}
		elseif ($found['state'] == 2) {
			echo "banned account";
		}
		else{
			$_SESSION['deactivated_id'] = $found['account_id'];
			echo "deactivated account";
		}
	}
    else{
		echo "Incorrect Username or Password";
	}
}
// create account
elseif(isset($_POST['crt_uname']) && isset($_POST['crt_pass'])){
	$username = encode($_POST['crt_uname']);
	$password = encrypt(encode($_POST['crt_pass']));
 	// $password = encrypt(encode($_POST['crt_pass']));
	if(mysqli_query($conn,"INSERT INTO augeo_user_end.user_account(account_id,username,password) VALUES ('','$username','$password') ")){
		$result = mysqli_query($conn,"SELECT * From augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' AND augeo_user_end.user_account.password = '$password' ");
		$found = mysqli_fetch_array($result);
		$user_id = $found['account_id'];
		$account_id = $found['account_id'];
		mysqli_query($conn,"INSERT INTO augeo_user_end.user(user_id,account_id,profile_img,cover_photo) VALUES ('$user_id','$account_id','http://localhost/augeo/data/user/profile_img/default_avatar.jpg','http://localhost/augeo/data/user/cover_photo/1.jpg')");
		$_SESSION['account_id']=$found['account_id'];
		 $description = 'Customer Account has been Created -- User ID: <a href="http://localhost/augeo/admin/parent_admin/pages/customers/info/?account_id='.$account_id.'"> '.$account_id.' </a>';
        mysqli_query($conn,"INSERT INTO augeo_application.user_log(userlog_id,user_id,type,description) VALUES ('','.$account_id.','3','$description')");

		mysqli_query($conn,"INSERT INTO augeo_application.user_logtime(user_id) VALUES ('$account_id') ");
		$_SESSION['log_id'] = mysqli_insert_id($conn);
		echo "success";
	}
	else{
		echo "failed".mysqli_error($conn);
	}
}
else{
  $username = encode($_POST['uname']);

	// check if entered username and password is in the database
	$result = mysqli_query($conn,"SELECT augeo_user_end.user_account.username FrOm augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' ");
	if($row = mysqli_num_rows($result) != 0){
		echo "This Username is already taken";
	}
	else{
		echo "Username's Available";
	}
}
?>