<?php
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
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
                                <div class="panel-title">Account Activity</div>
                            </div>
                            <div class="content-box-large box-with-header">




       <div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                  <thead>
                    <tr>
                      <th>Log Id</th>
                      <th>Details</th>
                      <th>Time</th>
                  </tr>
                </thead>
            <tbody id="articleArea">
</tbody>

</table>
<div id="pagination">
        <!-- Just tell the system we start with page 1 (id=1) -->
        <!-- See the .js file, we trigger a click when page is loaded -->
        <div><a href="#" id="1"></a></div>
    </div>
</div>


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
                                <label>Deactivate Account<br> Deactivating this Account wil something something</label><br>
                                <input type="submit" name="deactivate" id="deactivate" value="Deactivate Account"><br><br>

                                <label>Delete Account<br>Deleting this Account wil something something</label><br>
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