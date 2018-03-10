<?php
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php");
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");

if(isset($_POST['delete_item']) && $_POST['item_state'] == 0){
        $id = $_POST['delete_item'];
        mysqli_query($conn,"UPDATE augeo_user_end.item SET augeo_user_end.item.state = 2 WHERE augeo_user_end.item.item_id = $id");
        echo mysqli_error($conn);
}

elseif(isset($_POST['delete_item']) && $_POST['item_state'] == 2){
        $id = $_POST['delete_item'];
        mysqli_query($conn,"UPDATE augeo_user_end.item SET augeo_user_end.item.state = 0 WHERE augeo_user_end.item.item_id = $id");
        echo mysqli_error($conn);
}
?>