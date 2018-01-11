<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../global/css/topbar.css">
	<link rel="stylesheet" href="../../global/css/default.css">
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<?php require "../../global/php/topbar.html"; ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div id="tree"></div>
			</div>
			<div class="col-sm-9">
				<div class="container-fluid">
<div class="cc" id="cc"></div>
				</div>
			</div>
		</div>
	</div>

	<script src="../../global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="../../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../../global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/view.js"></script>
	<script src="js/home.js"></script>
</body>
</html>