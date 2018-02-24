<?php

//Objective: retrieve basic information on items in auction
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

//get items' ID, name and desciption, timestamp, one image filename, and highest bid price
$query =
    'SELECT '.
        'item.item_id, '.
        'item.name, '.
        'item.description, '.
        'item.timestamp, '.
        'img_path, '.
        'amount '.
    'FROM '.
        'augeo_user_end.item, '.
        'augeo_application.bid, '.
        'augeo_user_end.item_img '.
    'WHERE '.
        'item.item_id = item_img.item_id AND '.
        'item.item_id = bid.item_id AND '.
        'state = 0 '.
    'GROUP BY item.item_id '.
    'ORDER BY item.item_id, amount '.
    'LIMIT 10';

if(!($result = $conn->query($query))) {
    header("HTTP/1.1 500 Internal Server Error");
    header('Content-Type: text/html; charset=UTF-8');
    exit();
}

//for each items, get all of its tags by first determining all IDs
//so that querying will be done in one batch for faster retrieval
$item_list = array();
$itemID_list = '';

while($row = $result->fetch_assoc()) {
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