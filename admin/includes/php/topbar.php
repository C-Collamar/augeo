<?php
	//used to determine if user has logged in
	require_once $_SERVER['DOCUMENT_ROOT'].'/augeo/admin/includes/php/session.php';
?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsable">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="margin: 0px; padding: 5px">
                <img src="http://localhost/augeo/global/img/logo.png" id="brand-logo">
                <span id="brand-name">AUGEO</span>
                <span id="brand-name">Admin</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="collapsable">
			<?php
				if(isset($account_id_session)) { //print HTML below if user is logged in
					if(!isset($profile_img)) {
						//get profile picture file name
						require_once $_SERVER['DOCUMENT_ROOT'].'/augeo/global/php/connection.php';
						$result = mysqli_query(
							$conn,
							"SELECT profile_img ".
							"FROM augeo_user_end.user ".
							"WHERE account_id = $account_id_session"
						) or die("Query error: ".mysqli_error($conn));
						$profile_img = mysqli_fetch_row($result)[0];
					}
			?>

			<form class="nav navbar-nav navbar-form" action="">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="Search">
					<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
				</div>
			</form>

			<ul class="nav navbar-nav navbar-right">
                <!--
				<li style="padding: 0px 15px">
					<button id="add-item" class="btn btn-default navbar-btn">Add item</button>
				</li>
                -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<img src="<?php echo 'http://localhost/augeo/data/user/profile_img/'.$profile_img ?>" id="avatar" alt="Settings">
						<span class="caret" style="margin-left: 10px;"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="http://localhost/augeo/user/account">My Account</a></li>
						<li><a href="http://localhost/augeo/admin/includes/php/session.php?logout=1">Sign out</a></li>
					</ul>
				</li>
			</ul>
			<?php } else { //otherwise print the HTML below ?>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="http://localhost/augeo/login/">Log in</a>
				</li>
			</ul>
			<?php } ?>
     	</div>
    </div>
</nav>
<script>
	//redirect to page for adding new auction item if 'Add item' button is clicked
	document.getElementById("add-item").onclick = function() {
		window.location = "http://localhost/augeo/add-item/";
	}
</script>