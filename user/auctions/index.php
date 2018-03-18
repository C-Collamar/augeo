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
	<!--
<a class="row card-item" href="#">
	<div class="col-sm-7 border-right">
		<div class="media">
			<div class="media-left media-middle">
				<img src="http://localhost/augeo/data/user/items/2_0.jpg" class="media-object item-img">
			</div>
			<div class="media-body">
				<h4 class="media-heading">Mossimo Boomer SS Unisex Silver Stainless Steel Strap Ana-Digi Watch MS-1506G-YLW</h4>
				<span class="item-seller">You</span>
				<div class="w-100"></div>
				<span class="bidders-participated">5</span>
			</div>
		</div>
	</div>
	<div class="col-sm-5 text-center align-middle">
		<div class="row no-padding">
			<div class="col-xs-6">
				<div class="row no-padding"><span class="text-caption">Your bid</span></div>
				<div class="row no-padding">
				<h4>&#8369; 5.00</h4>
				</div>
				<div class="row no-padding"><small>1 week ago</small></div>
			</div>
			<div class="col-xs-6">
				<div class="row no-padding"><span class="text-caption">Highest bid</span></div>
				<div class="row no-padding">
				<h4>&#8369; 6.00</h4>
				</div>
				<div class="row no-padding"><small>3 days ago</small></div>
			</div>
		</div>
	</div>
</a>
	-->
</body>
</html>