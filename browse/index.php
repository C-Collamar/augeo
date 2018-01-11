<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
	<link rel="stylesheet" href="css/browse.css">
</head>
<body>
    <?php require "../global/php/topbar.html" ?>

    <div id="browse-content">
        <button class="btn btn-green" onclick="toggleOptionPanel()">Options</button>
        a<br>
        a<br>
        a<br>
    </div>
    <div id="side-panel">
        b
    </div>

	<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
    <script src="js/browse.js"></script>
</body>
</html>