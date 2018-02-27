<<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
session_start();
$id = $_SESSION['deactivated_id'];
 mysqli_query($conn,"UPDATE augeo_administration.admin_account set  augeo_administration.admin_account.state = 1 where augeo_administration.admin_account.account_id = '$id'");
 session_destroy();
    header("location: ../../?activated=1");

 ?>