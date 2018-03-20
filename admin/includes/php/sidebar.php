<?php
// Sidebar for the admin
// 1 = Parent Admin
// 2 = normal admin

if($_SESSION['account_type'] == 1){
    echo ' <div class="page-content">
<div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    ';
                    if($link == "http://localhost/augeo/admin/parent_admin/"){
                      echo '<li class="current"><a href="http://localhost/augeo/admin/parent_admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>';
                  }
                   else
                       echo '<li><a href="http://localhost/augeo/admin/parent_admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>';

                    if($link == "http://localhost/augeo/admin/parent_admin/pages/items")
                      echo ' <li class="current"><a href="http://localhost/augeo/admin/parent_admin/pages/items"><i class="glyphicon glyphicon-list"></i> Items</a></li>';
                    else
                       echo '<li><a href="http://localhost/augeo/admin/parent_admin/pages/Items"><i class="glyphicon glyphicon-list"></i> Items</a></li>';

                    if($link == "http://localhost/augeo/admin/parent_admin/pages/transactions")
                      echo '<li class="current"><a href="http://localhost/augeo/admin/parent_admin/pages/transactions"><i class="glyphicon glyphicon-list"></i> Transactions</a></li>';
                    else
                      echo '<li><a href="http://localhost/augeo/admin/parent_admin/pages/transactions"><i class="glyphicon glyphicon-list"></i> Transactions</a></li>';
                     if($link == "http://localhost/augeo/admin/parent_admin/pages/logs")
                      echo '<li class="current"><a href="http://localhost/augeo/admin/parent_admin/pages/logs"><i class="glyphicon glyphicon-list"></i>Logs</a></li>';
                    else
                      echo '<li><a href="http://localhost/augeo/admin/parent_admin/pages/logs"><i class="glyphicon glyphicon-list"></i>Logs</a></li>';
echo '
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Users
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="http://localhost/augeo/admin/parent_admin/pages/admins">Admins</a></li>
                            <li><a href="http://localhost/augeo/admin/parent_admin/pages/customers">Customers</a></li>
                            <li><a href="http://localhost/augeo/admin/parent_admin/pages/new_account">Create New Account</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
          </div>';
        }
else{
    echo ' <div class="page-content">
<div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    ';
                    if($link == "http://localhost/augeo/admin/normal_admin")
                      echo '<li class="current"><a href="http://localhost/augeo/admin/normal_admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>';
                   else
                       echo '<li><a href="http://localhost/augeo/admin/normal_admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>';


                    if($link == "http://localhost/augeo/admin/normal_admin/pages/items")
                      echo '<li class="current"><a href="http://localhost/augeo/admin/normal_admin/pages/items"><i class="glyphicon glyphicon-list"></i> Items</a></li>';
                    else
                      echo '<li><a href="http://localhost/augeo/admin/normal_admin/pages/items"><i class="glyphicon glyphicon-list"></i> Items</a></li>';
                    echo '
                </ul>
             </div>
          </div>';
}
?>

