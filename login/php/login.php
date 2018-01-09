<?php
include("../../global/php/connection.php");
include("../../global/php/encrypt.php");

    // code to act on the $request
    // echo back to the calling page
     $username = encode($_POST['uname']);
     $password = encrypt(encode($_POST['pass']));




// check if entered username and password is in the database
$result = mysqli_query($conn,"SELECT augeo_user_end.user_account.username,augeo_user_end.user_account.password,augeo_user_end.user_account.account_id FrOm augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' AND augeo_user_end.user_account.username = '$password' ");
    if($row=mysqli_num_rows($result) == 1){
            $found = mysqli_fetch_array($result);
           $account_id =  $found['account_id'];
           header("Location: ../../home/");
        }
    else{
           echo "Incorrect Username or Password";
}



?>