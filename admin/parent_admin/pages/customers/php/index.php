<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");

header("Content-Type: application/json; charset=UTF-8");


$result = mysqli_query($conn,"SELECT * FROM augeo_user_end.user_account INNER JOIN  augeo_user_end.user ON augeo_user_end.user_account.account_id = augeo_user_end.user.account_id WHERE augeo_user_end.user_account.account_id = augeo_user_end.user.account_id ");

/*
  while($row = mysqli_fetch_array($result)){

echo
 '{ '.                       '"account_id": "'.decode($row['account_id']).'", '.
                            '"f_name": "'.decode($row['f_name']).'", '.
                            '"m_name": "'.decode($row['m_name']).'", '.
                            '"l_name": "'.decode($row['l_name']).'", '.
                            '"state": "'.decode($row['state']).'", '.
                            '"email": "'.decode($row['email']).'", '.
                            '"username": "'.decode($row['username']).'" '.

                    '}, ';

}

*/
$outp = array();
$outp =mysqli_fetch_all($result);
echo json_encode($outp);

?>