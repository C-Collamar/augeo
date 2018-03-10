<?php
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/parent_admin/pages/transactions";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";

if(isset($_SESSION['account_type']) && isset($_SESSION['admin_id'])){
    if($_SESSION['account_type'] == "2")
        header("Location: http://localhost/augeo/admin/");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link href="css/index.css" rel="stylesheet">
<body>

    <input type="hidden" name="id" id="id" value="1">
    <div class="col-md-10">
            <div class="row">


                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Data Representation in all transaction made</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                        <div id="area-chart" ></div>
                    <br>


                </div>
                </div>



                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Transactions By Customers</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">

                    <div id="data_transaction"></div>
                    <br>
                    <div id="pagination">
                        <div><a href="#" id="1"></a></div>
                    </div>

                </div>
                </div>





            </div>
        </div>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="http://localhost/augeo/admin/vendors/morris/morris.css">
        <script src="   http://localhost/augeo/admin/vendors/raphael-min.js"></script>
        <script src="http://localhost/augeo/admin/vendors/morris/morris.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>