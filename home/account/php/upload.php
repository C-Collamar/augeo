<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
$extension = explode("/", $_FILES["file"]["type"]);
$id = $_SESSION['account_id'];
$result = mysqli_query($conn,"SELECT augeo_user_end.user_account.username FrOm augeo_user_end.user_account where augeo_user_end.user_account.account_id = '$id' ");

          $found = mysqli_fetch_array($result);
           $username =  $found['username'];

$filename = $username.'.'.$extension[1];


/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/augeo/data/user/profile_img/".$filename)){
mysqli_query($conn,"UPDATE augeo_user_end.user set  augeo_user_end.user.profile_img = '$filename' where augeo_user_end.user.account_id = '$id'");
echo "success";
}else{
    echo "failed";
}
