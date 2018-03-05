<?php
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/parent_admin/pages/customers/info/";
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/sidebar.php";
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

    <input type="hidden" name="id" id="id" value="<?php echo $_GET['account_id']; ?>">
    <div class="col-md-10">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="http://localhost/augeo/admin">Dashboard</a></li>
                    <li><a href="http://localhost/augeo/admin/parent_admin/pages/customers">Customers</a></li>
                    <li class="active">Info</li>
                </ol>
                <div class="col-md-12">
                    <div class="content-box-header">
                            <div class="panel-title">Profile Information</div>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                            </div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <label>Account Id:</label>
                        <div id="account_id"></div>

                        <label>Profile Pic:</label>
                        <div id="profile_pic"> </div></br> <br>

                        <label>Username:</label>
                        <div id="username"> </div><br>

                        <label>Full Name:</label>
                        <div id="full_name"> </div><br>

                        <label>Birthday:</label>
                        <div id="bday"></div><br>

                        <label>Zip Code:</label>
                        <div id="zipcode"> </div><br>

                        <label>Full Address:</label>
                        <div id="full_address"> </div><br>

                        <label>Contact number:</label>
                        <div id="contact_no"> </div><br>

                        <label>Email:</label>
                        <div id="email"> </div><br>
                            <br /><br />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Transaction Made</div>
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

                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Items</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="content-box-large box-with-header">

                </div>
                </div>


                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Account Settings</div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                    </div>
                <div class="content-box-large box-with-header">
                    <label>Ban This Account</label><br>
                    <input type="submit" name="deactivate" id="deactivate" value="Deactivate Account"><br><br>

                    <label>Delete Account</label><br>
                    <input type="submit" name="delete" id="delete" value="Delete Account">
                </div>
                </div>

            </div>
        </div>

    <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>