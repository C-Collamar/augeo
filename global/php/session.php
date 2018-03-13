<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['account_id'])) {
    header($_SERVER['SERVER_PROTOCOL']." 302 Found");
    header("Location: http://localhost/augeo/login");
    exit();
}
elseif(isset($_GET['logout'])) {
    require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
    $id = $_SESSION['account_id'];
    $log_id = $_SESSION['log_id'];
    setcookie("account_id", $id, time() - (86400 * 30), "/");
    $date = date_create();
    $date = date_format($date, 'Y-m-d H:i:s');
    mysqli_query($conn,"UPDATE augeo_application.user_logtime set augeo_application.user_logtime.logout_time = '$date' WHERE logtime_id = '$log_id'");
    echo mysqli_error($conn);
    header("Location: http://localhost/augeo/login");
    unset($_SESSION['account_id']);
    session_destroy();
}
elseif(isset($_SESSION['account_id'])) {
    $account_id_session = $_SESSION['account_id'];
}

?>