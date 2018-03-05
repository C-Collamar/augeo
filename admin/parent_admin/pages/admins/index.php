<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/parent_admin/pages/admins/";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
        <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
        <link href="css/index.css" rel="stylesheet">
  </head>

<body>

    <div class="col-md-10">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="http://localhost/augeo/admin">Dashboard</a></li>
                <li class="active">Admins</li>
            </ol>

            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title"><b>Active And Inactive Admins</b></div>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div id="hero-donut2" style="height: 230px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title"><b>List Of Administrator Of AUGEO</b></div>
                </div>

            <div class="nav navbar-nav navbar-form">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" onkeyup="test(this.value)" name="search" id="search">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                </div>
            </div>

                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Account Id</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>State</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody id="data_admin"></tbody>
                    </table>

                    <div id="pagination">
                        <div><a href="#" id="1"></a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

		      </div>
    </div>
</div>
<?php
            if(isset($_GET['msg'])){
            $img_path = "";
            $message = "";
            $class = "";
                $class = "show-notif";
                $img_path = "http://localhost/augeo/global/img/check-icon.png";

                    $message = "Account Deleted";

            echo('
                <div class="notif '.$class.'" id="notif-container">
                    <div class="notif-img">
                        <img id="notif-img" src="'.$img_path.'" />
                    </div>
                    <div class="notif-content" id="notif-content">'.$message.'</div>
                </div>
            ');
        }
        ?>

        <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
        <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://localhost/augeo/admin/vendors/morris/morris.css">
        <script src="   http://localhost/augeo/admin/vendors/raphael-min.js"></script>
        <script src="http://localhost/augeo/admin/vendors/morris/morris.min.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>