<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");


// FOR GETTING ALL INFORMATION OF THE USER
if(isset($_POST['id'])){
$id = $_POST['id'];
$sql = "SELECT * FROM augeo_user_end.user_account INNER JOIN  augeo_user_end.user ON augeo_user_end.user_account.account_id = augeo_user_end.user.account_id WHERE augeo_user_end.user_account.account_id = '$id'";

if($result = $conn->query($sql)) {
                    $row = $result->fetch_assoc();


echo
                    '{ '.
                            '"f_name": "'.decode($row['f_name']).'", '.
                            '"m_name": "'.decode($row['m_name']).'", '.
                            '"l_name": "'.decode($row['l_name']).'", '.

                            '"contact_no": "'.decode($row['contact_no']).'", '.
                            '"email": "'.decode($row['email']).'", '.
                            '"profile_img": "'.decode($row['profile_img']).'", '.

                            '"bdate": "'.decode($row['bdate']).'", '.
                            '"zip_code": "'.decode($row['zip_code']).'", '.
                            '"username": "'.decode($row['username']).'", '.
                            '"full_address": "'.decode($row['full_address']).'" '.
                    '}';
}
else{
    echo "failed";
}
}

//UPDATING PASSWORD

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






// updating profile section
elseif (isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['bdate']) && isset($_POST['contact_no']) && isset($_POST['profile_id']) &&
isset($_POST['zip_code']) && isset($_POST['full_address']) ) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $contact_no = $_POST['contact_no'];
    $zip_code = $_POST['zip_code'];
    $full_address = $_POST['full_address'];
    $id = $_POST['profile_id'];


    if(mysqli_query($conn,"UPDATE augeo_user_end.user set  augeo_user_end.user.f_name = '$fname',augeo_user_end.user.m_name = '$mname',augeo_user_end.user.l_name = '$lname',
  augeo_user_end.user.bdate = '$bdate',augeo_user_end.user.contact_no = '$contact_no',augeo_user_end.user.zip_code = '$zip_code',augeo_user_end.user.full_address = '$full_address'  where augeo_user_end.user.account_id = '$id'")){
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
    session_start();
    session_destroy();
    }
    else{
        echo "failed";
    }
}

?>