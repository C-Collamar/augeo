<?php
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/normal_admin/pages/items";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";

if(isset($_SESSION['account_type']) && isset($_SESSION['admin_id'])){
    if($_SESSION['account_type'] == "1")
        header("Location: ../../../parent_admin");
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
                        <div class="panel-title">Total Numbers of Items</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">
                        <div id="hero-area-item" style="height: 230px;"></div>
                    <br>


                </div>
                </div>



                <div class="col-md-12">
                     <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><b>Items</b></div>
        </div>

    <div class="nav navbar-nav navbar-form">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" onkeyup="test(this.value)" name="search" id="search">
              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        </div>
    </div>

    <div class="panel-body">
        <table class="table-responsive table table-striped" id="example">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Owner</th>
                    <th>Views</th>
                    <th>State</th>
                </tr>
            </thead>

            <tbody id="data_items"></tbody>

        </table>

    <div id="pagination">
        <div><a href="#" id="1"></a></div>
    </div>
</div>
</div>
                </div>


            </div>
        </div>
 <?php if(isset($_GET['msg'])){
            $img_path = "";
            $message = "";
            $class = "";
                $class = "show-notif";
                $img_path = "http://localhost/augeo/global/img/check-icon.png";
                    $message = "Item successfully Modified.";
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