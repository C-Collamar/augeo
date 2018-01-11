<?php
session_start();
include("../../global/php/connection.php");
include("../../global/php/encrypt.php");


if(isset($_POST['uname']) && isset($_POST['pass'])){
     $username = encode($_POST['uname']);
    $password = encode($_POST['pass']);
    // $password = encrypt(encode($_POST['pass']));

// check if entered username and password is in the database
$result = mysqli_query($conn,"SELECT augeo_user_end.user_account.username,augeo_user_end.user_account.password,augeo_user_end.user_account.account_id FrOm augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' AND augeo_user_end.user_account.username = '$password' ");
    if($row=mysqli_num_rows($result) == 1){
          $found = mysqli_fetch_array($result);
           $account_id =  $found['account_id'];
           echo "sucess";
           $_SESSION['account_id'] = $account_id;
        }
    else{
           echo "Incorrect Username or Password";
}

}

// create account
elseif(isset($_POST['crt_uname']) && isset($_POST['crt_pass'])) {
     $username = encode($_POST['crt_uname']);
     $password = encode($_POST['crt_pass']);
//  $password = encrypt(encode($_POST['crt_pass']));
 if(mysqli_query($conn,"INSERT INTO augeo_user_end.user_account(account_id,username,password) VALUES ('','$username','$password') ")){
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
    if($row=mysqli_num_rows($result) != 0){
            echo "This Username is already taken";
        }
    else{
            echo "Username's Available";

}

}

?>