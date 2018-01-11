<?php
session_start();

if(!isset($_SESSION['account_id'])){
    header("Location: http://localhost/augeo/login");
}

elseif(isset($_GET['logout'])) {
    header("Location: http://localhost/augeo/login");
    unset($_SESSION['account_id']);
    session_destroy();
}

?>