<?php

//Objective: Get information on items currently active in auction that user has bidded
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
        'CONCAT(user.f_name, " ", LEFT(user.m_name, 1), ". ", user.l_name) AS seller, '.
        'item_img.img_path, '.
        'MAX(bid.amount) AS user_bid, '.
        "(SELECT MAX(bid.amount) FROM augeo_application.bid) AS highest_bid, ".
        "(SELECT DATE_FORMAT(bid.timestamp, '%M %e, %Y') FROM augeo_application.bid ORDER BY bid.amount DESC LIMIT 1) AS latest_bid_date, ".
        'DATE_FORMAT(bid.timestamp, "%M %e, %Y") AS user_bid_date '.
    'FROM '.
        'augeo_user_end.item_img, '.
        'augeo_user_end.item, '.
        'augeo_user_end.user, '.
        'augeo_application.bid '.
    'WHERE '.
        'item_img.item_id = item.item_id AND '.
        'item.state = 0 AND '.
        'item.user_id = user.user_id AND '.
        'item.item_id = bid.item_id AND '.
        "bid.user_id = $account_id_session ".
    'ORDER BY bid.timestamp DESC';

    if(!$result = $conn->query($query)) {
        header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
        exit(mysqli_error($conn));
    }

    $bidded_items = [];
    while($item = $result->fetch_assoc()) {
        $item['seller'] = decode($item['seller']);
        $item['img_path'] = decode($item['img_path']);
        $item['name'] = decode($item['name']);
        array_push($bidded_items, $item);
    }

    header($_SERVER['SERVER_PROTOCOL']." 200 OK");
    exit(json_encode($bidded_items));
}
else {
    header($_SERVER['SERVER_PROTOCOL']." 403 Forbidden");
    exit();
}

?>