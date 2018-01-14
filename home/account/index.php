<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
	<link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.html";
    require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
	//require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/session.php";
	 ?>
<input type="hidden" name="account_id_session" id="account_id_session" value="<?php echo $account_id_session; ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div id="tree"></div>
			</div>


			<div class="col-sm-9">
				<div class="container-fluid">

<div id="profile">
	<div class="well">
<h2>Personal Information</h2>
<h3>Profile Picture</h3>
<img src="" id="img"><br>
<a class="edit" data-toggle="collapse" href="#collapse1">edit</a>
<div id="collapse1" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item">  <input type="file" id="file" name="file" onchange="display_img(this);" />         </li>
        <li class="list-group-item">   <input type="button" name="but_upload" value="Upload" id="but_upload"></li>

      </ul>
      <div class="panel-footer"><input type="submit" name="submit_name" id="save" value="save" > </div>
</div>


<hr>





<p><h3>Name</h3> <div class="d-inline" id="fullname"> </div>
	<a class="edit" data-toggle="collapse" href="#collapse2">edit</a></p>

    <div id="collapse2" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item"> Fisrt name: <input class="form-control" type="text" name="uname" id="uname" placeholder="First Name" > </li>
        <li class="list-group-item">Middle name: <input type="text" class="form-control" name="uname" id="mname" placeholder="Middle Name" > </li>
        <li class="list-group-item">Last name:   <input type="text" class="form-control" name="uname" id="lname" placeholder="Last Name" > </li>
      </ul>
      <div class="panel-footer"><input type="submit" name="submit_name" id="save" value="save" > </div>
</div>


<hr>
<h4>Birth Day</h4>


<hr>
<label for="contact_no">contact</label>
<input type="text" class="form-control" name="contact_no" id="contact_no">

<hr>
</div>


</div>
</div>



<!--ACCOUNT SIDEBAR-->
<div class="col-sm-9">
				<div class="container-fluid">

<div id="accounta">
<div class="well">
<h2>Login</h2>
<h3>Change Password:</h3>

<label for="current_pass">Enter Current Password</label><br>
<input type="password" class="form-control" name="current_pass" id="current_pass"></br>
<label for="new_pass1">Enter New Password</label><br>
<input type="password" class="form-control" name="new_pass1" id="new_pass1" ></br>
<label for="new_pass2">Re-enter New Password</label><br>
<input type="password" class="form-control" name="new_pass2" id="new_pass2"></br>
<hr>
<input type="button" name="new_pass_btn" id="new_pass_btn" value="save">
</div>


<div class="well">
<label for="email">Email</label>
<input type="email" class="form-control" name="email" id="email" >
</div>

</div>

</div>
</div>








</div>
</div>
	<script src="http://localhost/augeo/global/vendor/jquery/dist/jquery.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="http://localhost/augeo/global/vendor/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>