<?php

if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['account_id'])) {
    $account_id_session = $_SESSION['account_id'];
}

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
			<ul class="nav navbar-nav">
                <li id="home_nav"><a href="http://localhost/augeo/">HOME</a></li>
                <li id="browse_nav"><a href="http://localhost/augeo/browse">BROWSE</a></li>
                <li id="categ_nav"><a href="http://localhost/augeo/categories">CATEGORIES</a></li>
			</ul>
			<form class="nav navbar-nav navbar-form" action="">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="Search">
					<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li style="padding: 0px 15px">
					<button id="add-item" class="btn btn-default navbar-btn" onclick="window.location = 'http://localhost/augeo/item/add/'">Add item</button>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<img src="<?php echo $profile_img ?>" id="avatar" alt="Settings">
						<span class="caret" style="margin-left: 10px;"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="http://localhost/augeo/user/account">My Account</a></li>
						<li><a href="http://localhost/augeo/user/auctions">My Auctions</a></li>
						<li><a href="http://localhost/augeo/global/php/session.php?logout=1">Sign out</a></li>
					</ul>
				</li>
			</ul>
			<?php } else { //otherwise print the HTML below ?>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="http://localhost/augeo/login/"><span class="glyphicon glyphicon-log-in"></span>
					<span style="padding-left: 5px">Log in</span>
					</a>
				</li>
			</ul>
			<?php } ?>
     	</div>
    </div>
</nav>