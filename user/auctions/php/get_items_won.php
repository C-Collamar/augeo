<?php

//Objective: Get auction history
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

//authenticate request
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if($_SERVER['REQUEST_METHOD'] != 'GET') { //validate request method
        header($_SERVER['SERVER_PROTOCOL']." 405 Method Not Allowed");
        exit();
    }

    //get user bids to be automatically recognized as winning bid due to time limit
    $query =
    'SELECT '.
        'GROUP_CONCAT(bid.bid_id) AS bid_ids, '.
        'GROUP_CONCAT(bid.item_id) AS item_ids '.
    'FROM '.
        'augeo_application.bid, '.
        'augeo_user_end.item '.
    'WHERE '.
        'bid.item_id = item.item_id AND '.
        'item.state = 0 AND '.
        'item.expiration_date < CURRENT_TIMESTAMP() AND '.
        "$account_id_session = (".
            'SELECT bid.user_id FROM augeo_application.bid ORDER BY bid.amount LIMIT 1'.
        ')';
    if(!$result = $conn->query($query)) {
        header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
        exit(mysqli_error($conn).PHP_EOL.$query);
    }
    $row = $result->fetch_assoc();

    if($row['item_ids'] && $row['bid_ids']) {
        //set state of items to sold in selected bids above
        $item_ids = $row['item_ids'];
        $query = "UPDATE augeo_user_end.item SET state = 1 WHERE item.item_id IN ($item_ids)";
        if(!$result = $conn->query($query)) {
            header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
            exit(mysqli_error($conn).PHP_EOL.$query);
        }
        
        //each bid ID will be used to make a deal
        $bid_pool = explode(',', $row['bid_ids']);
        $query = '';
        foreach($bid_pool as $bid_id) {
            $query .= "($bid_id, DATE_ADD(NOW(), INTERVAL 5 DAY)),";
        }
        $query =
        'INSERT INTO augeo_application.deal (bid_id, due_date) VALUES '.substr($query, 0, -1);
    
        if(!$result = $conn->query($query)) {
            header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
            exit(mysqli_error($conn).PHP_EOL.$query);
        }
    }

    $query =
    'SELECT '.
        'user.user_id, '.
        'CONCAT(f_name, " ", LEFT(m_name, 1), ". ", l_name) AS seller, '.
        'item.item_id, '.
        'item.name, '.
        'item_img.img_path, '.
        'bid.amount, '.
        'DATE_FORMAT(deal.timestamp, "%M %e, %Y") AS date '.
    'FROM '.
        'augeo_user_end.item, '.
        'augeo_user_end.item_img, '.
        'augeo_application.bid, '.
        'augeo_application.deal, '.
        'augeo_user_end.user '.
    'WHERE '.
        'deal.bid_id = bid.bid_id AND '.
        "bid.user_id = $account_id_session AND ".
        'bid.item_id = item.item_id AND '.
        'item.item_id = item_img.item_id AND '.
        'item.user_id = user.user_id '.
    'GROUP BY deal.deal_id '.
    'ORDER BY deal.timestamp DESC';

    if(!$result = $conn->query($query)) {
        header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
        exit(mysqli_error($conn).PHP_EOL.$query);
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