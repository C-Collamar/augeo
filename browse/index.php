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

	<button class="btn btn-default" onclick="toggleOptionPanel()">Options</button>
	<div id="browse-content">
		<div class="container">
			<div class="card">
				<img src="http://localhost/augeo/data/user/items/0_0.jpg" alt="">
				<div class="container-fluid">
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
			<div class="card">
				<img src="http://localhost/augeo/data/user/profile_img/0.png" alt="">
				<div class="container-fluid">
					<h4><b>XBox360</b></h4> 
					<p class="item-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, sapiente</p> 
					<div class="highest-bid">Php 5.00</div>
					<div class="tag-list">
						<a href="">tagname-1</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="side-panel">
		<div style="margin-bottom: 10px;">
			<button class="btn btn-default" onclick="toggleOptionPanel()">Close</button>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Search</div>
			<div class="panel-body">
				<div style="margin-bottom: 10px;">
					<label class="radio-inline"><input type="radio" name="" name="" checked>Item name</label>
					<label class="radio-inline"><input type="radio" name="" name="">Tag name</label>
				</div>
				<input type="text" class="form-control" placeholder="Search term">
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Sort</div>
			<div class="panel-body">
				<div id="ordering-options">
					<label class="radio-inline"><input type="radio" name="" checked>Ascending</label>
					<label class="radio-inline"><input type="radio" name="">Descending</label>
				</div>
				<hr style="margin: 10px 0px 10px 0px;">
				<div><label class="radio-inline"><input type="radio" name="" checked>Item name</label></div>
				<div><label class="radio-inline"><input type="radio" name="">Date of upload</label></div>
			</div>
		</div>
		<center><button class="btn btn-green" onclick="toggleOptionPanel()">Search</button></center>
	</div>

	<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/browse.js"></script>
</body>
</html>
