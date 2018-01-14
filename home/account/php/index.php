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

elseif (isset($_POST['update_email']) && isset($_POST['id_email'])) {
    echo "success";
}

?>