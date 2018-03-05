<?php
require $_SERVER['DOCUMENT_ROOT']."/augeo/admin/includes/php/topbar.php";
$link = "http://localhost/augeo/admin/parent_admin/pages/admins/info/";
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
            <li><a href="http://localhost/augeo/admin/parent_admin/pages/admins/">Admins</a></li>
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
                  <div class="panel-title">Account Activity</div>
              </div>
              <div class="content-box-large box-with-header">
                  <div class="panel-body">
                      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                          <thead>
                              <tr>
                                  <th>Details</th>
                                  <th>Time</th>
                              </tr>
                          </thead>
                          <tbody id="data_info"></tbody>

                      </table>

                      <div id="pagination">
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
                   <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="ban-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ban This Account</h4>
      </div>
      <div class="modal-body">
          <h4>Banning this account will prevent its user from logging in to this website.<br> <b> PROCEED WITH CAUTION</b></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="ban-yes">Confirm</button>
        <button type="button" class="btn btn-primary" id="ban-no">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete This Account</h4>
      </div>
      <div class="modal-body">
          <h4>Deleting this account remove all of its data including transactions,items and everything.<br> <b> PROCEED WITH CAUTION</b></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="delete-yes">Confirm</button>
        <button type="button" class="btn btn-primary" id="delete-no">Cancel</button>
      </div>
    </div>
  </div>
</div>

                    <button class="btn btn-default" id="ban-account">Ban Account</button><br>
                    <h3>OR</h3>
                    <button class="btn btn-default" id="delete-account">Delete Account</button><br>
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

                    $message = "Account Has Been Banned";

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
</body>
</html>