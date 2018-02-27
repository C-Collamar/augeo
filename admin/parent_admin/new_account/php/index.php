<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");

    $username = encode($_POST['username']);
    $password = encrypt(encode($_POST['password']));

// creatinf parent admin
if($_POST['account_type'] == 1){
    if(mysqli_query($conn,"INSERT INTO augeo_administration.admin_account(account_id,username,password) VALUES ('','$username','$password') ")){
        $result = mysqli_query($conn,"SELECT * From augeo_administration.admin_account where augeo_administration.admin_account.username = '$username' AND augeo_administration.admin_account.password = '$password' ");
        $found = mysqli_fetch_array($result);
        $user_id = $found['account_id'];
        $account_id = $found['account_id'];
        mysqli_query($conn,"INSERT INTO augeo_administration.admin(user_id,account_id,role_id,profile_img,cover_photo) VALUES ('$user_id','$account_id',1,'http://localhost/augeo/data/user/profile_img/default_avatar.jpg','http://localhost/augeo/data/user/cover_photo/1.jpg')");
        $_SESSION['account_id']=$found['account_id'];
        echo "success";
    }
    else{
        echo "failed".mysqli_error($conn);
    }

}
// creating normal admin
elseif ($_POST['account_type'] == 2) {
        if(mysqli_query($conn,"INSERT INTO augeo_administration.admin_account(account_id,username,password) VALUES ('','$username','$password') ")){
        $result = mysqli_query($conn,"SELECT * From augeo_administration.admin_account where augeo_administration.admin_account.username = '$username' AND augeo_administration.admin_account.password = '$password' ");
        $found = mysqli_fetch_array($result);
        $user_id = $found['account_id'];
        $account_id = $found['account_id'];
        mysqli_query($conn,"INSERT INTO augeo_administration.admin(user_id,account_id,role_id,profile_img,cover_photo) VALUES ('$user_id','$account_id',2,'http://localhost/augeo/data/user/profile_img/default_avatar.jpg','http://localhost/augeo/data/user/cover_photo/1.jpg')");
        $_SESSION['account_id']=$found['account_id'];
        echo "success";
    }
    else{
        echo "failed".mysqli_error($conn);
    }

}
// creating user
else{
     if(mysqli_query($conn,"INSERT INTO augeo_user_end.user_account(account_id,username,password) VALUES ('','$username','$password') ")){
        $result = mysqli_query($conn,"SELECT * From augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' AND augeo_user_end.user_account.password = '$password' ");
        $found = mysqli_fetch_array($result);
        $user_id = $found['account_id'];
        $account_id = $found['account_id'];
        mysqli_query($conn,"INSERT INTO augeo_user_end.user(user_id,account_id,profile_img,cover_photo) VALUES ('$user_id','$account_id','http://localhost/augeo/data/user/profile_img/default_avatar.jpg','http://localhost/augeo/data/user/cover_photo/1.jpg')");
        $_SESSION['account_id']=$found['account_id'];
        echo "success";
    }
    else{
        echo "failed".mysqli_error($conn);
    }
}

?>