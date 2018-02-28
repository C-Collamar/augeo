<?php

if(session_status() == PHP_SESSION_NONE){
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: http://localhost/augeo/admin/login");
}

elseif(isset($_GET['logout'])) {
    $id = $_SESSION['admin_id'];
    setcookie("admin_id", $id, time() - (86400 * 30), "/");
    header("Location: http://localhost/augeo/admin");
    unset($_SESSION['admin_id']);
    unset($_SESSION['account_type']);
    session_destroy();
}
elseif (isset($_SESSION['admin_id'])) {
    $account_id_session = $_SESSION['admin_id'];
}
}
else{


if(!isset($_SESSION['admin_id'])){
    header("Location: http://localhost/augeo/admin/login");
}

elseif(isset($_GET['logout'])) {
    $id = $_SESSION['admin_id'];
    setcookie("admin_id", $id, time() - (86400 * 30), "/");
    header("Location: http://localhost/augeo/admin");
    unset($_SESSION['admin_id']);
    unset($_SESSION['account_type']);
    session_destroy();
}
elseif (isset($_SESSION['admin_id'])) {
    $account_id_session = $_SESSION['admin_id'];
}
}


?>