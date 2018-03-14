<?php

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

if(isset($_POST['update_profile'])) {
	//upload image file
	if(isset($_FILES['profile_img'])) {
		$target_dir = $_SERVER['DOCUMENT_ROOT'].'/augeo/data/user/profile_img/';
		$target_file = $target_dir.basename($_FILES['profile_img']['name']);
		$uploadOk = true;

		//check if upload type is supported. Only JPEG file types are accepted
		$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		if($fileType != 'jpg' && $fileType != 'jpeg') {
			$_SESSION['message'] = 'File type not supported. ';
			$uploadOk = false;
		}

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["profile_img"]["tmp_name"]);
		if($check === false) {
			$uploadOk = false;
		}

		//upload the file to server
		if($uploadOk) {
			move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_dir.$_SESSION['account_id'].'.'.$fileType);
		}
		else {
			$_SESSION['message'] += 'Profile image is not modified.';
		}
	}
	else {
		exit(print_r($_FILES));
	}

	$f_name = encode($_POST['f_name']);
	$m_name = encode($_POST['m_name']);
	$l_name = encode($_POST['l_name']);
	$address = encode($_POST['address']);
	$zip_code = encode($_POST['zipcode']);
	$contact_no = encode($_POST['contact_no']);

	$result = mysqli_query($conn,
		"UPDATE augeo_user_end.user ".
		"SET ".
			"f_name = '$f_name', ".
			"m_name = '$m_name', ".
			"l_name = '$l_name', ".
			"zip_code = $zip_code, ".
			"contact_no = '$contact_no', ".
			"full_address = '$address' ".
		"WHERE account_id = ".$_SESSION['account_id']
	);

	if(!$result) {
		exit(mysqli_error($conn));
	}

	header('Location: ../../../account/');
	exit();
}


elseif (isset($_POST['old_pass'])  && isset($_POST['new_pass']) && isset($_POST['pass_id']) ) {
    $id = $_POST['pass_id'];
    $old_password = encrypt(encode($_POST['old_pass']));
    $new_password =encrypt(encode($_POST['new_pass']));

$result = mysqli_query($conn,"SELECT augeo_user_end.user_account.password FrOm augeo_user_end.user_account where augeo_user_end.user_account.account_id = '$id' ");
    $found = mysqli_fetch_array($result);
    if($found['password'] == $old_password){
    mysqli_query($conn,"UPDATE augeo_user_end.user_account set  augeo_user_end.user_account.password = '$new_password' where augeo_user_end.user_account.account_id = '$id'");
    echo "success";
    }
    else{
        echo "failed";
    }
}
// updating profile
elseif (isset($_POST['update_email']) && isset($_POST['id_email'])) {
    $id = $_POST['id_email'];
    $email = $_POST['update_email'];
    $result = mysqli_query($conn,"SELECT augeo_user_end.user.email FrOm augeo_user_end.user where augeo_user_end.user.account_id <> '$id' AND augeo_user_end.user.email = '$email' ");
    if(mysqli_num_rows($result) == 0){
    mysqli_query($conn,"UPDATE augeo_user_end.user set  augeo_user_end.user.email = '$email' where augeo_user_end.user.account_id = '$id'");
    echo "success";
    }
    else{
        echo "failed";
    }






}



// deactivating account
//
elseif(isset($_POST['deac_pass1']) && isset($_POST['deac_pass2']) && isset($_POST['deac_id'])) {
    $password1 = encrypt(encode($_POST['deac_pass1']));
    $id = $_POST['deac_id'];

    $result = mysqli_query($conn,"SELECT augeo_user_end.user_account.password FrOm augeo_user_end.user_account where augeo_user_end.user_account.account_id = '$id' ");
    $found = mysqli_fetch_array($result);
    if($found['password'] == $password1){
    mysqli_query($conn,"UPDATE augeo_user_end.user_account set  augeo_user_end.user_account.state = 0 where augeo_user_end.user_account.account_id = '$id'");
    echo "success";
    unset($_SESSION['account_id']);
    session_destroy();
    }
    else{
        echo "failed";
    }
}

?>