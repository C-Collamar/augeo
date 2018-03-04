<?php

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>View Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link rel="stylesheet" href="css/view_item.css">
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php"; ?>
    <?php
    function display404() {
        exit(
        '<style>'.
            '#back-btn {'.
                'display: block;'.
                'width: fit-content;'.
                'margin: 30px auto 0px auto;'.
                'background-color: #a53a41;'.
                'border: 4px solid #a53a41;'.
                'padding: 10px 16px;'.
                'color: white;'.
                'transition: background-color, color 0.2s;'.
            '}'.
            '#back-btn:hover {'.
                'background-color: #ffffff;'.
                'color: #a53a41;'.
            '}'.
        '</style>'.
        '<div style="text-align: center; padding-top: 50px;">'.
            '<div style="font-size: 100px; user-select: none">404</div>'.
            '<div style="font-size: 20px; ">OOPS! SORRY WE CAN\'T FIND THAT ITEM!</div>'.
            '<div style="font-size: 15px; ">How about visiting our browsing section?</div>'.
            '<a href="http://localhost/augeo/browse" id="back-btn">Have fun</a>'.
        '</div>'
        );
    }

    if(isset($_GET['id'])) { //if ID is present in the URI
        $item_id = encode($_GET['id']);

        //get item and seller information
        $query =
            "SELECT ".
                "item.*, ".
                "user.user_id, ".
                "f_name, ".
                "m_name, ".
                "l_name, ".
                "email, ".
                "profile_img ".
            "FROM ".
                "augeo_user_end.item, ".
                "augeo_user_end.user ".
            "WHERE ".
                "user.user_id = item.user_id AND ".
                "item.item_id = $item_id";
        $item_info = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);

        if(mysqli_num_rows($item_info) <= 0) {
            display404();
        }

        //get item tag(s)
        $query =
            "SELECT ".
                "tag.tag_id, ".
                "tag.tag_name ".
            "FROM ".
                "augeo_user_end.tag, ".
                "augeo_application.tagged_item ".
            "WHERE ".
                "tag.tag_id = tagged_item.tag_id AND ".
                "tagged_item.item_id = $item_id";
        $tags = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);

        //get item image(s)
        $query = "SELECT img_path FROM augeo_user_end.item_img WHERE item_id = $item_id";
        $img_paths = $conn->query($query) or die('ERROR: '.mysqli_error($conn).'<br>'.'QUERY: '.$query);
    ?>
    <div class="container-fluid" style="padding: 20px 0px 0px 0px">
        <div class="col-sm-9">
            <div id="title">Super amazing title</div>
            <div id="description" class="well">
                A home 250GB slim game console developed by Microsoft. As the successor to the original Xbox, it is the second console in the Xbox series nd it's super fun to play with. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, sapiente.
            </div>
            <div id="item-images" class="well">
                <img src="http://localhost/augeo/data/user/items/17_1.jpg">
                <img src="http://localhost/augeo/data/user/items/17_0.jpg">
            </div>
            <div class="tag-list">
                <a href="">tagname-2</a>
                <a href="">tagname-1</a>
                <a href="">tagname-3</a>
            </div>
        </div>
        <div class="col-sm-3">Right side</div>
    </div>
    <?php } else display404(); ?>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>