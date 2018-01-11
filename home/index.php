<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../global/css/topbar.css">
	<link rel="stylesheet" href="../global/css/default.css">
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<?php require "../global/php/topbar.html" ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div id="tree"></div>
			</div>
			<div class="col-sm-9">
				<div class="container-fluid">
					<a class="row card-item">
						<div class="col-sm-7 border-right">
							<div class="media">
								<div class="media-left">
									<img src="../data/user/profile_img/0.png" class="media-object item-img" title="Sample item description.">
								</div>
								<div class="media-body">
									<h4 class="media-heading">Item name</h4>
									<span class="item-seller">Christian A. Collamar</span>
									<div class="w-100"></div>
									<span class="bidders-participated">5</span>
								</div>
							</div>
						</div>
						<div class="col-sm-5 text-center align-middle">
							<div class="row no-padding">
								<div class="col-xs-6">
									<div class="row no-padding your-bid"><h4>&#8369; 5.00</h4></div>
									<div class="row no-padding"><small>1 week ago</small></div>
								</div>
								<div class="col-xs-6">
								<div class="row no-padding highest-bid"><h4>&#8369; 6.00</h4></div>
								<div class="row no-padding"><small>3 days ago</small></div>
								</div>
							</div>
						</div>
					</a>
					<div class="hr-sect">December 2017</div>
					<a class="row card-item">
						<div class="col-sm-7 border-right">
							<div class="media">
								<div class="media-left">
									<img
										src="../data/user/items/0_0.jpg"
										class="media-object item-img" title="A home 250GB slim game console developed by Microsoft. As the successor to the original Xbox, it is the second console in the Xbox series nd it's super fun to pl...">
								</div>
								<div class="media-body">
									<h4 class="media-heading">XBox360</h4>
									<div class="w-100"></div>
									<span class="bidders-participated">5</span>
								</div>
							</div>
						</div>
						<div class="col-sm-5 text-center align-middle">
							<div class="row no-padding vertical-align">
								<div class="col-xs-6">
									<div class="row no-padding highest-bid"><h4>&#8369; 6.00</h4></div>
									<div class="row no-padding"><small>3 days ago</small></div>
								</div>
								<div class="col-xs-6">
									<button class="btn btn-green">Lock</button>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<script src="../global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/view.js"></script>
	<script src="js/home.js"></script>
</body>
</html>