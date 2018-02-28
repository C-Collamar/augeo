<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");



if(isset($_POST['uname']) &&  isset($_POST['account_type'])){
  $username = encode($_POST['uname']);

  if($_POST['account_type'] == 1 || $_POST['account_type'] == 2){
        $result = mysqli_query($conn,"SELECT augeo_administration.admin_account.username FrOm augeo_administration.admin_account where augeo_administration.admin_account.username = '$username' ");
    if($row = mysqli_num_rows($result) != 0){
        echo "This Username is already taken";
    }
    else{
        echo "Username's Available";
    }
  }

  else{
    $result = mysqli_query($conn,"SELECT augeo_user_end.user_account.username FrOm augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' ");
    if($row = mysqli_num_rows($result) != 0){
        echo "This Username is already taken";
    }
    else{
        echo "Username's Available";
    }
  }


    // check if entered username and password is in the database

}


// creatinf parent admin
elseif($_POST['account_type'] == 1 && isset($_POST['username']) && isset($_POST['password']) ){
    $username = encode($_POST['username']);
    $password = encrypt(encode($_POST['password']));
    if(mysqli_query($conn,"INSERT INTO augeo_administration.admin_account(account_id,username,password) VALUES ('','$username','$password') ")){
        $result = mysqli_query($conn,"SELECT * From augeo_administration.admin_account where augeo_administration.admin_account.username = '$username' AND augeo_administration.admin_account.password = '$password' ");
        $found = mysqli_fetch_array($result);
        $user_id = $found['account_id'];
        $account_id = $found['account_id'];
        mysqli_query($conn,"INSERT INTO augeo_administration.admin(admin_id,account_id,role_id,profile_img,cover_photo) VALUES ('$user_id','$account_id',1,'http://localhost/augeo/data/user/profile_img/default_avatar.jpg','http://localhost/augeo/data/user/cover_photo/1.jpg')");
        $_SESSION['account_id']=$found['account_id'];
        echo "success";
    }
    else{
        echo "failed".mysqli_error($conn);
    }

}
// creating normal admin
elseif ($_POST['account_type'] == 2 && isset($_POST['username']) && isset($_POST['password']) ) {
       $username = encode($_POST['username']);
    $password = encrypt(encode($_POST['password']));
        if(mysqli_query($conn,"INSERT INTO augeo_administration.admin_account(account_id,username,password) VALUES ('','$username','$password') ")){
        $result = mysqli_query($conn,"SELECT * From augeo_administration.admin_account where augeo_administration.admin_account.username = '$username' AND augeo_administration.admin_account.password = '$password' ");
        $found = mysqli_fetch_array($result);
        $user_id = $found['account_id'];
        $account_id = $found['account_id'];
        mysqli_query($conn,"INSERT INTO augeo_administration.admin(admin_id,account_id,role_id,profile_img,cover_photo) VALUES ('$user_id','$account_id',2,'http://localhost/augeo/data/user/profile_img/default_avatar.jpg','http://localhost/augeo/data/user/cover_photo/1.jpg')");
        $_SESSION['account_id']=$found['account_id'];
        echo "success";
    }
    else{
        echo "failed".mysqli_error($conn);
    }

}
// creating user
elseif ($_POST['account_type'] == 3 && isset($_POST['username']) && isset($_POST['password'])){
       $username = encode($_POST['username']);
    $password = encrypt(encode($_POST['password']));
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