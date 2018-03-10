<?php

//Objective: record user's bid
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

//check for unauthorized access
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['user_id'], $_POST['item_id'], $_POST['amount']) || !is_numeric($_POST['user_id']) || !is_numeric($_POST['item_id']) || !is_numeric($_POST['amount'])) {
        header("HTTP/1.1 412 Precondition Failed");
        exit(print_r($_POST));
    }

    $user_id = $_POST['user_id'];
    $item_id = $_POST['item_id'];
    $amount = $_POST['amount'];

    $query =
        "DELIMITER $$ ".
        "CREATE PROCEDURE IF NOT EXISTS insert_bid( ".
            "IN usr_id INT(11), ".
            "IN itm_id INT(11), ".
            "IN amnt DECIMAL(12, 2) ".
        ") ".
        "BEGIN ".
            "INSERT INTO augeo_application.bid ( ".
                "user_id, ".
                "item_id, ".
                "amount ".
            ") VALUES ( ".
                "usr_id, ".
                "itm_id, ".
                "amnt ".
            "); ".
            "SELECT ".
                "bid.timestamp, ".
                "bid.amount, ".
                "user_account.username ".
            "FROM ".
                "augeo_application.bid, ".
                "augeo_user_end.user, ".
                "augeo_user_end.user_account ".
            "WHERE ".
                "bid.user_id = user.user_id AND ".
                "user.account_id = user_account.account_id AND ".
                "bid.user_id = usr_id AND ".
                "bid.item_id = itm_id AND ".
                "bid.amount = amnt; ".
        "END $$ ".
        "DELIMITER ; ".
        "CALL insert_bid($user_id, $item_id, $amount);";

    if(!($result = $conn->query($query))) {
        header("HTTP/1.1 500 Internal Server Error");
        header('Content-Type: text/html; charset=UTF-8');
        exit(mysqli_error($conn).PHP_EOL.$query);
    }

    $inserted = $result->fetch_assoc();

    header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");
    $bid_info['date'] = date("F j, Y", strtotime($inserted['timestamp']));
    $bid_info['amount'] = sprintf("%.2f", $bid['amount']);
    $bid_info['username'] = decode($inserted['username']);
    exit(json_encode($bid_info));
}
else header("HTTP/1.1 403 Forbidden");

?>