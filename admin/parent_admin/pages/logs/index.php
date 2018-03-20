<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/parent_admin/pages/logs";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";
include($_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/connection.php");

if(isset($_SESSION['account_type']) && isset($_SESSION['admin_id'])){
    if($_SESSION['account_type'] == "2")
        header("Location: http://localhost/augeo/admin/");
}
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



    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><b>Customer's Visits</b></div>
        </div>

    <div class="panel-body">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-responsive" id="example">
            <thead>
                <tr>
                    <th>user id</th>
                    <th>Login Time</th>
                    <th>Logout Time</th>
                </tr>
            </thead>

            <tbody id="data_customer"></tbody>

        </table>

    <div id="pagination">
        <div><a href="#" id="1"></a></div>
    </div>
</div>
</div>



    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><b>Logs by admin in admin users</b></div>
        </div>

    <div class="panel-body">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-responsive" id="example">
            <thead>
                <tr>
                    <th>admin id</th>
                    <th>details</th>
                    <th>time</th>
                </tr>
            </thead>

            <tbody id="data_admin"></tbody>

        </table>

    <div id="pagination1">
        <div><a href="#" id="1"></a></div>
    </div>
</div>
</div>


    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><b>Logs by admin in Customers</b></div>
        </div>

    <div class="panel-body">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-responsive" id="example">
            <thead>
                <tr>
                    <th>admin id</th>
                    <th>details</th>
                    <th>time</th>
                </tr>
            </thead>

            <tbody id="data_customer1"></tbody>

        </table>

    <div id="pagination12">
        <div><a href="#" id="1"></a></div>
    </div>
</div>
</div>

    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><b>Logs by admin in item</b></div>
        </div>

    <div class="panel-body">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-responsive" id="example">
            <thead>
                <tr>
                    <th>admin id</th>
                    <th>details</th>
                    <th>time</th>
                </tr>
            </thead>

            <tbody id="data_byadmin"></tbody>

        </table>

    <div id="pagination2">
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
                    $message = "Account successfully deleted.";
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