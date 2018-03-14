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

    $query = "CALL augeo_application.insert_bid($user_id, $item_id, $amount)";

    if(!$result = $conn->query($query)) {
        header("HTTP/1.1 500 Internal Server Error");
        header('Content-Type: text/html; charset=UTF-8');
        exit(mysqli_error($conn).PHP_EOL.$query);
    }

    $inserted = $result->fetch_assoc();
    $bid_info['date'] = date("F j, Y", strtotime($inserted['timestamp']));
    $bid_info['amount'] = sprintf("%.2f", $inserted['amount']);
    $bid_info['username'] = decode($inserted['username']);

    header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");
    exit(json_encode($bid_info));
}
else header("HTTP/1.1 403 Forbidden");

?>