<?php

//Objective: retrieve basic information on items in auction
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

/**
 * PROCESS:
 * 0. Get necessary item info along with it's highest bid if there is
 * 2. Replace item column `initial_price` with highest bid amount if item has bids
**/

//set the default item retrieval preference
//(defaults to enlisting 10 items in ascending order by item's current amount or initial price)
$ordering = 'ASC';
$order_by = 'IF(bid.amount, MAX(bid.amount), item.initial_price)';
$limit = '10';

if(isset($_GET['order-by'], $_GET['ordering'])) {
    $ordering = encode($_GET['ordering']);
    $order_by = array(
        'cheap price' => 'IF(bid.amount, bid.amount, item.initial_price)',
        'upload date' => 'item.timestamp',
        'item name' => 'item.name',
        'popularity' => 'item.view_count'
    )[$_GET['order-by']];
}

//0. Get necessary item info along with it's highest bid if there is
$q_item =
'SELECT '.
    'item.item_id, '.
    'item_img.img_path, '.
    'item.name, '.
    'item.description, '.
    'item.initial_price, '.
    'item.view_count, '.
    'item.timestamp, '.
    'item.initial_price, '.
    'MAX(bid.amount) AS amount '.
'FROM '.
    'augeo_user_end.item_img, '.
    'augeo_user_end.item LEFT JOIN augeo_application.bid ON item.item_id = bid.item_id '.
'WHERE '.
    'item.state = 0 AND '.
    'item.item_id = item_img.item_id '.
'GROUP BY '.
    'item.item_id '.
'ORDER BY '.$order_by.' '.$ordering.' LIMIT '.$limit;
$result = $conn->query($q_item);
//check if there are no items
if(mysqli_num_rows($result) == 0) {
    exit('{}');
}

//for each items, get all of its tags by first determining all IDs so that
//querying will be done in one batch for one-time data retrieval
$item_list = array();
$itemID_list = '';

while($row = $result->fetch_assoc()) {
    $row['name'] = decode($row['name']);
    $row['description'] = decode($row['description']);
    $itemID_list .= $row['item_id'].',';
    array_push($item_list, $row);
}
$itemID_list = substr($itemID_list, 0, -1);

$q_tag =
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
"ORDER by FIELD(item.item_id, $itemID_list)";


if(!($result = $conn->query($q_tag))) {
    header("HTTP/1.1 500 Internal Server Error");
    header('Content-Type: text/html; charset=UTF-8');
    exit(mysqli_error($conn));
}

//add tag information retrieved to the items retrieved in the first query
$row = $result->fetch_assoc();
foreach($item_list as $key => $item) {
    $tag_list = array();
    while($row['item_id'] == $item_list[$key]['item_id']) {
        array_push($tag_list, decode($row['tag_name']));
        $row = $result->fetch_assoc();
    }
    $item_list[$key]['tags'] = $tag_list;
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($item_list);

?>