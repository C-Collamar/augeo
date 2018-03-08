<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";
// test: cookies
// if cookies is set then user is always logged in
if(isset($_COOKIE['account_id'])){
        $_SESSION['account_id'] = $_COOKIE['account_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
<body>

<table class="table table-striped table-condensed voc_list ">

<thead>
<tr>
<th style="width:15%;"></th>
<th style="width:50%;">Bezeichnung</th>
<th style="width:10%;">Zeitraum</th>
<th style="width:25%;">Ort</th>
</tr>
</thead>

<tbody>

<tr class="listview">
<td>
<a href="xy" title="">
<img src="data/user/items/1_0.jpg" class="img-responsive voc_list_preview_img" alt="" title="" width="30%"></a>
</td>

<td>
<a href="xy" title="">
<h3 class="nomargin_top">ABC</h3>
</a>
</td>

<td>
555
</td>

<td>
XYZ
</td>

</tbody>

</table>


</body>
<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
</html>