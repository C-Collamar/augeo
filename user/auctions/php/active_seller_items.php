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

    //get basic item info
    $query =
    'SELECT '.
        'item.item_id, '.
        'item.name, '.
        'item.view_count, '.
        'item_img.img_path '.
    'FROM '.
        'augeo_user_end.item_img, '.
        'augeo_user_end.item '.
    'WHERE '.
        'item_img.item_id = item.item_id AND '.
        'item.state = 0 AND '.
        "item.user_id = $account_id_session ".
    'GROUP BY '.
        'item.item_id '.
    'ORDER BY '.
        'item.item_id '.
    'DESC';

    if(!$result = $conn->query($query)) {
        header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
        exit(mysqli_error($conn));
    }

    $items_in_auction = [];
    $id_pool = '';
    while($row = $result->fetch_assoc()) {
        $row['name'] = decode($row['name']);
        $row['img_path'] = decode($row['img_path']);
        $id_pool .= $row['item_id'].',';
        array_push($items_in_auction, $row);
    }
    $id_pool = substr($id_pool, 0, -1);

    $query =
    'SELECT '.
        'bid.item_id, '.
        'COUNT(bid.bid_id) AS bid_count, '.
        'MAX(bid.amount) as amount, '.
        'DATE_FORMAT(bid.timestamp, "%M %e, %Y") AS date '.
    'FROM '.
        'augeo_application.bid '.
    'WHERE '.
        "bid.item_id IN ($id_pool) ".
    'ORDER BY '.
        'bid.item_id '.
    'DESC';

    if(!$result = $conn->query($query)) {
        header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
        exit(mysqli_error($conn));
    }

    $index = 0;
    $lim = count($items_in_auction);
    while($row = $result->fetch_assoc()) {
        while($index < $lim && $row['item_id'] != $items_in_auction[$index]['item_id']) {
            ++$index;
        }
        if($index < $lim) {
            $items_in_auction[$index]['amount'] = $row['amount'];
            $items_in_auction[$index]['bid_count'] =  $row['bid_count'];
            $items_in_auction[$index]['date'] =  $row['date'];
        }
    }

    header($_SERVER['SERVER_PROTOCOL']." 200 OK");
    exit(json_encode($items_in_auction));
}
else {
    header($_SERVER['SERVER_PROTOCOL']." 403 Forbidden");
    exit();
}

?>