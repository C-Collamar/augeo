<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/parent_admin/pages/new_account/";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";

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
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
    <link href="../../css/index.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
  </head>
  <body>
          <div class="col-md-10">
                <ol class="breadcrumb">
                    <li><a href="http://localhost/augeo/admin">Dashboard</a></li>
                    <li class="active">New Account</li>
                </ol>
            <div class="row">
                <div class="col-md-12 panel-warning">
                    <div class="content-box-header panel-heading">
                        <div class="panel-title ">CREATE NEW ACCOUNT</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <form enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>Account Type:</label><br>
                            <input type="radio" name="account_type" id="account_type" value="1"> Parent Admin<br>
                            <input type="radio" name="account_type" id="account_type" value="2"> Normal admin<br>
                            <input type="radio" name="account_type" id="account_type" value="3"> User
                        </div>

                        <br>
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" id="username" class="form-control" required><br>
                        </div>

                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <span class="help-block" id ="uname_error"></span><br>
                        </div>
                        <input type="submit" name="submit" id="submit" value="Create Account" class="btn btn-md" onclick="return(create_account());">
                        </form>



                        <br /><br />
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
                    $message = "Account successfully created.";
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
    <script src="js/index.js"></script>
    <script src="../../js/index.js"></script>
  </body>
</html>