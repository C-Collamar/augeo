<?php
include("../../global/php/connection.php");
include("../../global/php/encrypt.php");

    // code to act on the $request
    // echo back to the calling page
    //
if(isset($_POST['uname']) && isset($_POST['pass'])){
     $username = encode($_POST['uname']);
     $password = encode($_POST['pass']);

// check if entered username and password is in the database
$result = mysqli_query($conn,"SELECT augeo_user_end.user_account.username,augeo_user_end.user_account.password,augeo_user_end.user_account.account_id FrOm augeo_user_end.user_account where augeo_user_end.user_account.username = '$username' AND augeo_user_end.user_account.username = '$password' ");
    if($row=mysqli_num_rows($result) == 1){
            $found = mysqli_fetch_array($result);
           $account_id =  $found['account_id'];
           echo "sucess";
        }
    else{
           echo "Incorrect Username or Password";
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