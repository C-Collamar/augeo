<?php

//Objective: Get seller items information currently in auction
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

//authenticate request
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if($_SERVER['REQUEST_METHOD'] != 'GET') { //validate request method
        header($_SERVER['SERVER_PROTOCOL']." 405 Method Not Allowed");
        exit();
    }

    $query =
    'SELECT '.
        'item.item_id, '.
        'item.name, '.
        'item.view_count, '.
        'item_img.img_path, '.
        'COUNT(bid.bid_id) AS bid_count, '.
        'IF(bid.amount, MAX(bid.amount), item.initial_price) AS curr_price, '.
        'DATE_FORMAT(IF(bid.bid_id, bid.timestamp, item.timestamp), "%M %e, %Y") AS date '.
    'FROM '.
        'augeo_user_end.item_img, '.
        'augeo_user_end.item '.
    'LEFT JOIN augeo_application.bid ON '.
        'item.item_id = bid.item_id '.
    'WHERE '.
        'item_img.item_id = item.item_id AND '.
        'item.state = 0 AND '.
        "item.user_id = $account_id_session ".
    'ORDER BY '.
        'bid.timestamp, '.
        'item.timestamp '.
    'DESC ';

    if(!$result = $conn->query($query)) {
        header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
        exit(mysqli_error($conn));
    }

    $items_in_auction = [];
    while($row = $result->fetch_assoc()) {
        $row['name'] = decode($row['name']);
        $row['img_path'] = decode($row['img_path']);
        array_push($items_in_auction, $row);
    }

    header($_SERVER['SERVER_PROTOCOL']." 200 OK");
    exit(json_encode($items_in_auction));
}
else {
    header($_SERVER['SERVER_PROTOCOL']." 403 Forbidden");
    exit();
}

?>