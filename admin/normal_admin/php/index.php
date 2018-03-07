<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");



 if (isset($_POST['item_count'])) {

    $sql = "SELECT COUNT(*) as total_item FROM augeo_user_end.item";

    if($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();

        echo
                    '{ '.
                            '"total": '.$row['total_item'].' '.
                    '}';
    }

 }




?>