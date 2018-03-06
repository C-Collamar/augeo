<?php

//Objective: retrieve basic information on items in auction
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

/**
 * PROCESS:
 * 0. Get highest bid if item has bids
 * 1. Get all item info
 * 2. Replace item column `initial_price` with highest bid amount if item has bids
**/

//0. Get highest bid amount of bidded items
$query =
"SELECT item.item_id, amount ".
"FROM ".
    "augeo_application.bid, ".
    "augeo_user_end.item ".
"WHERE ".
    "item.item_id = bid.item_id ".
"ORDER BY item.item_id";
$bids = $conn->query($query);

//1. Get item IDs with their title, description, timestamp, initial price, and one image filepath
$query =
    'SELECT '.
        'item.item_id, '.
        'item.name, '.
        'LEFT(item.description, 101) AS description, '. //add 1 to determine if description overflows
        'item.timestamp, '.
        'initial_price, '.
        'img_path '.
    'FROM '.
        'augeo_user_end.item, '.
        'augeo_user_end.item_img '.
    'WHERE '.
        'state = 0 AND '.
        'item.item_id = item_img.item_id '.
    'GROUP BY item.item_id '.
    'ORDER BY item.item_id '.
    'LIMIT 10';

if(!($result = $conn->query($query))) {
    header("HTTP/1.1 500 Internal Server Error");
    header('Content-Type: text/html; charset=UTF-8');
    exit();
}

//check if there are no items
if(mysqli_num_rows($result) == 0) {
    header('Content-Type: text/html; charset=UTF-8');
    exit();
}

//for each items, get all of its tags by first determining all IDs so that
//querying will be done in one batch for one-time data retrieval
$item_list = array();
$itemID_list = '';

while($row = $result->fetch_assoc()) {
    $bid = $bids->fetch_assoc();
    //decode string data
    $row['name'] = decode($row['name']);
    $row['img_path'] = decode($row['img_path']);
    $row['description'] = decode($row['description']);

    //if item has hishest bid, replace initial price data
    if($bid['item_id'] == $row['item_id']) {
        $row['highest_bid'] = $bid['amount'];
        unset($row['initial_price']);
    }
    array_push($item_list, $row);
    $itemID_list .= $row['item_id'].',';
}
$itemID_list = substr($itemID_list, 0, -1);
$query =
    "SELECT ".
        "tag_name, ".
        "item.item_id ".
    "FROM ".
        "augeo_user_end.tag, ".
        "augeo_user_end.item, ".
        "augeo_application.tagged_item ".
    "WHERE ".
        "tagged_item.tag_id = tag.tag_id AND ".
        "tagged_item.item_id = item.item_id AND ".
        "item.item_id IN ($itemID_list) ".
    "ORDER by item.item_id";

if(!($result = $conn->query($query))) {
    header("HTTP/1.1 500 Internal Server Error");
    header('Content-Type: text/html; charset=UTF-8');
    exit();
}

//add tag information retrieved to the items retrieved in the first query
$row = $result->fetch_assoc();
foreach($item_list as $key => $item) {
    $tag_list = array();
    while($row['item_id'] == $item_list[$key]['item_id']) {
        array_push($tag_list, $row['tag_name']);
        $row = $result->fetch_assoc();
    }
    $item_list[$key]['tags'] = $tag_list;
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($item_list);

?>