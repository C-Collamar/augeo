<?php
// redirect admin
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/session.php";
if(isset($_SESSION['account_type']) && isset($_SESSION['admin_id'])){
    if($_SESSION['account_type'] == "1")
        header("Location: parent_admin");
    else
        header("Location: normal_admin");
}

?>