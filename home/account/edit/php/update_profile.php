<?php

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	//upload image file
	if(isset($_POST['profile_img'])) {
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
			$_SESSION['message'] += 'Uploaded image is empty. ';
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

	if(mysqli_affected_rows($conn) != 1) {
		$_SESSION['message'] += 'A query error occured.';
	}

	header('Location: ../../../account/');
	exit();
}

?>