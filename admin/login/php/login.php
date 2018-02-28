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
			setcookie("admin_id", $account_id, time() + (86400 * 30), "/");
			$_SESSION['admin_id'] = $account_id;


			$result1 = mysqli_query($conn,"SELECT role_id FrOm augeo_administration.admin where augeo_administration.admin.admin_id = '$account_id'");
			$found1 = mysqli_fetch_array($result1);
			$_SESSION['account_type'] = $found1['role_id'];
			if($found1['role_id'] == "1")
				echo "sucess_parent";
			else
				echo "sucess_normal";

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