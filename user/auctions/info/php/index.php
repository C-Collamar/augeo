<?php
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
$id = $_POST['item_id'];
$deal_id = $_POST['deal'];
$sql = "UPDATE augeo_application.deal set confirmation = 1 WHERE deal_id = $deal_id";
$result = $conn->query($sql);
echo mysqli_error($conn);
header("Location: http://localhost/augeo/user/auctions/info/payment/?id=$id&deal_id=$deal_id");
?>