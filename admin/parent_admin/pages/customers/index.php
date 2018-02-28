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
                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Account Id</th>
                                <th>Username</th>
                                <th>State</th>
                                <th>Full Name</th>
                                <th>Email</th>

                            </tr>
                        </thead>
                        <tbody>
                                <div id="data_customer"></div>


                            <tr class="odd gradeX">
                                <td>Trident</td>
                                <td>Internet
                                     Explorer 4.0</td>
                                <td>Win 95+</td>
                                <td class="center"> 4</td>
                                <td class="center">X</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
		  </div>
		</div>
    </div>

        <script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="http://localhost/augeo/admin/vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="http://localhost/augeo/admin/vendors/datatables/dataTables.bootstrap.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>