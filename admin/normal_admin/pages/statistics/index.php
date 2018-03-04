<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/normal_admin/pages/statistics/";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";

if(isset($_SESSION['account_type']) && isset($_SESSION['admin_id'])){
    if($_SESSION['account_type'] == "1")
        header("Location: ../parent_admin");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link href="css/index.css" rel="stylesheet">
  </head>
<body>
    <div class="col-md-10">
		  <div class="row">
		  	<div class="col-md-12 panel-warning">
		  		<div class="content-box-header panel-heading">
	  				<div class="panel-title ">ITEMS</div>
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
		  		</div>

		  		<div class="content-box-large box-with-header">
						<br /><br />
					</div>
		  	</div>
		  </div>

		  </div>
		</div>
    </div>

  <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
  <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/index.js"></script>
</body>
</html>