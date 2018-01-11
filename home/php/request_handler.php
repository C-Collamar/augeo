<?php
require_once "../../global/php/connection.php";

switch ($_GET["id"]) {
    //corresponds to "Items you sell for auction"
    /*case 1:
        break;
    */

    default:
        echo var_dump($_GET);
        break;
}
?>