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

                 <h2 class="page-header"><div id="role"></div></h2>
        <div class="row">
          <!-- left column -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
              <img id="img" class="avatar img-circle img-thumbnail" alt="avatar">
            </div>
          </div>
          <!-- edit form column -->
          <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <h3>Personal info</h3>
              <div class="form-group">
                <label class="col-lg-3 control-label">Username:</label>
                <div class="col-lg-8">
                 <div class="well well-sm"> <div id="username"></div></div>
              </div>
            </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Full name:</label>
                <div class="col-lg-8">
                 <div class="well well-sm"> <div id="full_name"></div></div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Birthday:</label>
                <div class="col-lg-8">
                  <div class="well well-sm"><div id="bday"></div></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Zipcode:</label>
                <div class="col-lg-8">
                  <div class="well well-sm"><div id="zipcode"></div></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Full Address:</label>
                <div class="col-lg-8">
                  <div class="well well-sm"><div id="full_address"></div></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Contact Number:</label>
                <div class="col-md-8">
                  <div class="well well-sm"><div id="contact_no"></div></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Email:</label>
                <div class="col-md-8">
                  <div class="well well-sm"><div id="email"></div></div>
                </div>
              </div>
      </div>    
    </div>





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


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="unban-modal">
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
        <button type="button" class="btn btn-default" id="unban-yes">Confirm</button>
        <button type="button" class="btn btn-primary" id="unban-no">Cancel</button>
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
<?php
 $id = $_GET['account_id'];
        $sql = "SELECT * FROM augeo_administration.admin_account WHERE augeo_administration.admin_account.account_id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if($row['state'] == 1)
          echo '<button class="btn btn-default" id="ban-account">Ban Account</button><br>';
        else
          echo '<button class="btn btn-default" id="unban-account">UnBan Account</button><br>';
?>
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