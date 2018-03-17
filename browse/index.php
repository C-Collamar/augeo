<!DOCTYPE html>
<html>
<head>
<title>Browse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/footer.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link rel="stylesheet" href="css/browse.css">
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php"; ?>

    <div id="loader"></div>
    <form id="browse-options">
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
        <div class="grid" id="browse-items"></div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/footer.php"; ?>
    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/masonry/dist/masonry.pkgd.js"></script>
    <script src="http://localhost/augeo/global/vendor/marked/marked.min.js"></script>
    <script src="js/browse.js"></script>
</body>
</html>