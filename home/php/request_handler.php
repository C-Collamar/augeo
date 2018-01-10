<?php

switch ($_GET["id"]) {
    //corresponds to "Items you sell for auction"
    case 0:
        $result = {
            "item_img": "../ignore/dummy/cropped.png",
            
        };
        break;

    //corresponds to "Items you participate in bidding"
    case 1:
        break;

    default:
        # code...
        break;
}

?>