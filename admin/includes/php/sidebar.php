
<?php

if($_SESSION['account_type'] == 1)
    echo ' <div class="page-content">
<div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="http://localhost/augeo/admin/parent_admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-calendar"></i> Upcoming Events</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-stats"></i> Statistics</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-list"></i> Items</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-list"></i> Transactions</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-tasks"></i> Reports </a></li>
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
else{
    echo ' <div class="page-content">
<div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="http://localhost/augeo/admin/parent_admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-calendar"></i> Upcoming Events</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-stats"></i> Statistics</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-list"></i> Items</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-tasks"></i> Reports </a></li>
                </ul>
             </div>
          </div>';
}
?>

