<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.html";
	//require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
	 ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div id="tree"></div>
			</div>


			<div class="col-sm-9">
				<div class="container-fluid">

<div id="profile">
	<div class="well">

Profile Picture:
<img src="" id="img">
<a class="edit" data-toggle="collapse" href="#collapse1">edit</a>
<div id="collapse1" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item">  <input type="file" id="file" name="file" onchange="display_img(this);" />         </li>
        <li class="list-group-item">   <input type="button" class="button" name="but_upload" value="Upload" id="but_upload"></li>

      </ul>
      <div class="panel-footer"><input type="submit" name="submit_name" id="save" value="save" > </div>
</div>




	</div>

<div class="well">

<p>Name: '.$f_name.' '.$m_name.' '.$l_name.' <t> <a class="edit" data-toggle="collapse" href="#collapse2">edit</a></p>

    <div id="collapse2" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item"> Fisrt name: <input class="uname" type="text" name="uname" value="austin" placeholder="First Name" >           </li>
        <li class="list-group-item">Middle name: <input type="text" name="uname" placeholder="Middle Name" > </li>
        <li class="list-group-item">Last name:   <input type="text" name="uname" placeholder="Last Name" > </li>
      </ul>
      <div class="panel-footer"><input type="submit" name="submit_name" id="save" value="save" > </div>
</div>

	</div>


</div>

</div>
</div>




<div class="col-sm-9">
				<div class="container-fluid">

<div id="accounta">
askdasjdkl
</div>

</div>
</div>








</div>
</div>
	<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/view.js"></script>
	<script src="js/home.js"></script>
</body>
</html>