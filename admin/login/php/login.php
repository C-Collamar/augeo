<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");


if(isset($_POST['uname']) && isset($_POST['pass'])){
	$username = encode($_POST['uname']);
	$password = encrypt(encode($_POST['pass']));

	// check if entered username and password is in the database
	$result = mysqli_query($conn,"SELECT * FrOm augeo_administration.admin_account where augeo_administration.admin_account.username = '$username' AND augeo_administration.admin_account.password = '$password' ");
    if($row = mysqli_num_rows($result) == 1){
		$found = mysqli_fetch_array($result);

		if($found['state'] == 1){
			$account_id = $found['account_id'];
			setcookie("account_id", $account_id, time() + (86400 * 30), "/");
			$_SESSION['account_id'] = $account_id;
			echo "sucess";
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
?>