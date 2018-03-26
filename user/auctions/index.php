<!DOCTYPE html>
<html>
<head>
	<title>Auctions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/footer.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<?php
	require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
	require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div id="tree"></div>
			</div>
			<div class="col-sm-9">
				<div class="container-fluid">
					<div id="items"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	if(isset($_GET['msg'])) {
		$class = "show-notif";
		$img_path = "http://localhost/augeo/global/img/check-icon.png";
		$message = "Item successfully modified.";
		echo(
			'<div class="notif '.$class.'" id="notif-container">
				<div class="notif-img">
					<img id="notif-img" src="'.$img_path.'" />
				</div>
				<div class="notif-content" id="notif-content">'.$message.'</div>
			</div>'
		);
	}
	?>
	<?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/footer.php"; ?>
	<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/view.js"></script>
	<script src="js/home.js"></script>
</body>
</html>