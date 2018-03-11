<?php
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
$id = $_POST['deal'];
$sql = "UPDATE augeo_application.deal set confirmation = 1 WHERE deal_id = $id";
$result = $conn->query($sql);

header("Location: http://localhost/augeo/user/auctions/info/payment/?id=$id");
?>