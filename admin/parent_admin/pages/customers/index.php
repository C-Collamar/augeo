<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";

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
    <div class="content-box-large">

              <div class="panel-heading">
                  <div class="panel-title">List Of Customers</div>
              </div>
              <div class="nav navbar-nav navbar-form">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" onkeyup="test(this.value)" name="search" id="search">
          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        </div>
       </div>
            <div id="data_customer"></div>

		  </div>
		</div>
    </div>

        <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>