<?php

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

//authenticate request
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if($_SERVER['REQUEST_METHOD'] != 'POST') { //validate request method
        header($_SERVER['SERVER_PROTOCOL']." 405 Method Not Allowed");
        exit();
    }

    $item_id = encode($_POST['item_id']);

    //record transaction to be able to rollback in case any operation failes
    $conn->query('SET AUTOCOMMIT = 0');
    $conn->query('BEGIN TRANSACTION');

    try {
        $query = "UPDATE augeo_user_end.item SET state = 1 WHERE item.item_id = $item_id";

        if(!$result = $conn->query($query)) {
            $conn->query('ROLLBACK TRANSACTION');
            $conn->query('SET AUTOCOMMIT = 1');
            echo mysqli_error($conn);
            header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
            header('Content-Type: text/html; charset=UTF-8');
            exit();
        }

         $description = 'User: <a href="http://localhost/augeo/admin/parent_admin/pages/customers/info/?account_id='.$account_id_session.'"> '.$account_id_session.' </a>-- Ended Auction with item id <a href="http://localhost/augeo/admin/parent_admin/pages/items/info/?id='.$item_id.'">'.$item_id.' </a>';
        mysqli_query($conn,"INSERT INTO augeo_application.user_log(userlog_id,user_id,type,description) VALUES ('','.$account_id_session.','2','$description')");

        $query =
        'SELECT '.
            'bid.bid_id '.
        'FROM '.
            'augeo_application.bid '.
        'WHERE '.
            "bid.item_id = $item_id ".
        'ORDER BY bid.amount DESC';

        if(!$result = $conn->query($query)) {
            $conn->query('ROLLBACK TRANSACTION');
            $conn->query('SET AUTOCOMMIT = 1');
            echo mysqli_error($conn);
            header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
            header('Content-Type: text/html; charset=UTF-8');
            exit();
        }

        $bid_id = $result->fetch_assoc()['bid_id'];

        $query =
        'INSERT INTO augeo_application.deal ('.
            'bid_id, '.
            'due_date, '.
            'timestamp'.
        ') VALUES ('.
            $bid_id.', '.
            '"'.date('Y-m-d H:i:s', strtotime('+1 week')).'", '.
            '"'.date('Y-m-d H:i:s').'"'.
        ')';

        if(!$result = $conn->query($query)) {
            $conn->query('ROLLBACK TRANSACTION');
            $conn->query('SET AUTOCOMMIT = 1');
            echo mysqli_error($conn);
            header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
            header('Content-Type: text/html; charset=UTF-8');
            exit();
        }
        
        //commit transaction
        $conn->query('COMMIT TRANSACTION');
        $conn->query('SET AUTOCOMMIT = 1');

        header($_SERVER['SERVER_PROTOCOL']." 204 No Content");
        exit();
    }
    catch(Exception $e) {
        $conn->query('ROLLBACK TRANSACTION');
        $conn->query('SET AUTOCOMMIT = 1');
        header($_SERVER['SERVER_PROTOCOL']." 500 Internal Server Error");
        header('Content-Type: text/html; charset=UTF-8');
        exit($e->getMessage());
    }
}
else {
    header($_SERVER['SERVER_PROTOCOL']." 403 Forbidden");
    exit();
}

?>