<!DOCTYPE html>
<html>
<head>
<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../global/css/topbar.css">
	<!-- <link rel="stylesheet" href="../global/css/default.css"> -->
	<link rel="stylesheet" href="css/browse.css">
</head>
<body>
	<?php require "../global/php/topbar.html" ?>

	<div style="position: relative; border: 1px solid black">
		<div id="browse-content">
			<button class="btn btn-default" onclick="toggleOptionPanel()">Options</button>
		</div>
		<div id="side-panel">
			<div style="margin-bottom: 10px;">
				<button class="btn btn-default" style="width: 100%;" onclick="toggleOptionPanel()">CLOSE</button>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Search</div>
				<div class="panel-body">
					<div style="margin-bottom: 10px;">
						<label class="radio-inline"><input type="radio" name="optradio" checked name="search-by">Item name</label>
						<label class="radio-inline"><input type="radio" name="optradio" name="search-by">Item description</label>
					</div>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>s
	</div>

	<script src="../global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="../global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/browse.js"></script>
</body>
</html>