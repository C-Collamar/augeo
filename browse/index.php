<!DOCTYPE html>
<html>
<head>
<title>Browse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link rel="stylesheet" href="css/browse.css">
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php"; ?>

    <form id="browse-options">
        <!-- Order, Order by -->
        <div>
            <span>Order by:</span>
            <select name="order-by" id="">
                <option value="cheap price">Item amount</option>
                <option value="upload date">Date of upload</option>
                <option value="item name">Item name</option>
                <option value="popularity">Popularity</option>
            </select>
        </div>
        <div>
            <span>Ordering:</span>
            <select name="ordering" id="">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="filter">Go</button>
    </form>
    <div style="width: 100%">
        <div class="grid" id="browse-items">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
        </div>
    </div>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/masonry/dist/masonry.pkgd.js"></script>
    <script src="js/browse.js"></script>
    <!-- TEMPLATE -->
    <!--
        <div class="grid-item">
            <div class="card">
                <img src="http://localhost/augeo/data/user/items/0_0.jpg" alt="">
                <div class="item-details">
                    <h4><b>XBox360</b></h4>
                    <p class="item-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, sapiente...</p>
                    <div class="highest-bid">Php 5.00</div>
                    <div class="tag-list">
                        <a href="">tagname-2</a>
                        <a href="">tagname-1</a>
                        <a href="">tagname-3</a>
                    </div>
                </div>
            </div>
        </div>
    -->
</body>
</html>