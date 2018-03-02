<?php

//custom error handlers
set_error_handler(function($errno, $errstr) {
    header("HTTP/1.1 500 Internal Server Error");
    header('Content-Type: text/html; charset=UTF-8');
    exit("ERROR: [$errno] $errstr.");
});

function reportQueryError($err_msg, $query) {
    echo 'Query: '.$query.'\n';
    trigger_error($err_msg);
}

//Objective: insert new item for auction to the database and redirect to the uploaded item page
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

//authenticate request
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    /**
     * PROCESS:
     * 0. Check if there are no files uploaded
     * 1. Insert new only tags
     * 2. Get the all tag IDs of the item to be inserted
     * 3. Insert item, and get its ID
     * 4. Associate inserted item with its tags
     * 5. Save item to server and insert item path
    **/

    //0: if there is no file uploaded
    if($_FILES['imgFiles']['tmp_name'][0] == '') {
        exit(trigger_error("Upload at least one file."));
    }
    
    //trim and convert tags to lowercase
    $tags = explode(',', encode($_POST['tags']));
    foreach($tags as $i => $tag) {
        $tags[$i] = strtolower(trim($tag));
    }

    //determine existing tags
    $query = "SELECT tag_name FROM augeo_user_end.tag WHERE tag_name IN (";
    foreach($tags as $tag) {
        $query .= "'".$tag."',";
    }
    $query = substr($query, 0, -1).')';
    $result = $conn->query($query) or reportQueryError(mysqli_error($conn), $query);

    //determine non-existing tags
    $num_rows = mysqli_num_rows($result);
    
    //create hashmap to determine existing tags
    while($row = $result->fetch_assoc()) {
        $existing_tags[$row['tag_name']] = 0;
    }

    //1: insert non-existing tags
    $query = "INSERT INTO augeo_user_end.tag(tag_name) VALUES ";
    $shouldQuery = false;
    foreach($tags as $tag) {
        if(!isset($existing_tags[$tag])) {
            $query .= "('".$tag."'),";
            $shouldQuery = true;
        }
    }
    if($shouldQuery) {
        $query = substr($query, 0, -1);
        $result = $conn->query($query) or reportQueryError(mysqli_error($conn), $query);
    }

    //2. Get tag IDs
    $query = "SELECT tag_id FROM augeo_user_end.tag WHERE tag_name IN (";
    foreach($tags as $tag) {
        $query .= "'".$tag."',";
    }
    $query = substr($query, 0, -1).')';
    $tag_list = $conn->query($query) or reportQueryError(mysqli_error($conn), $query);

    //3. insert item
    $name = encode(trim($_POST['title']));
    $description = encode(trim($_POST['description']));
    $bid_interval = encode(trim($_POST['bid-interval']));
    $initial_price = encode(trim($_POST['initial-price']));
    $query =
        "INSERT INTO augeo_user_end.item(".
            "user_id,".
            "name,".
            "description,".
            "initial_price,".
            "bid_interval".
        ") VALUES (".
            $account_id_session.",".
            "'$name',".
            "'$description',".
            "$initial_price,".
            "$bid_interval".
        ")";
    $result = $conn->query($query) or reportQueryError(mysqli_error($conn), $query);

    //get inserted item's ID (not reliable)
    $query = "SELECT item_id FROM augeo_user_end.item ORDER BY item_id DESC LIMIT 1";
    $item_id = $conn->query($query)->fetch_assoc()['item_id'] or reportQueryError(mysqli_error($conn), $query);

    //4. Associate item with its tags
    $query = "INSERT INTO augeo_application.tagged_item(tag_id, item_id) VALUES ";
    while($row = $tag_list->fetch_assoc()) {
        $query .= "(".$row['tag_id'].", $item_id),";
    }
    $query = substr($query, 0, -1);
    $conn->query($query) or reportQueryError(mysqli_error($conn), $query);

    //5. Save item images to server
    $target_dir = $_SERVER['DOCUMENT_ROOT'].'/augeo/data/user/items/';

    foreach($_FILES['imgFiles']['tmp_name'] as $key => $tmp_name) {
        $target_file = $target_dir.basename($_FILES['imgFiles']['name'][$key]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["imgFiles"]["tmp_name"][$key], $target_dir.$item_id.'_'.$key.'.'.$fileType);
    }

    //return success
    header('Content-Type: application/json; charset=UTF-8');
    exit(json_encode($item_id));
}
else trigger_error("Invalid access.");

?>