    <?php
session_start();

if(isset($_SESSION['account_id'])) {
    $account_id_session = $_SESSION['account_id'];
}

require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/topbar.php";

require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/connection.php";
require_once $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/encrypt.php";

// test: cookies
// if cookies is set then user is always logged in
if(isset($_COOKIE['account_id'])){
        $_SESSION['account_id'] = $_COOKIE['account_id'];
}



$sql = "SELECT * FROM augeo_user_end.item WHERE augeo_user_end.item.state = 0 ORDER BY augeo_user_end.item.initial_price DESC LIMIt 4";
$result = $conn->query($sql);


$sql1 = "SELECT * FROM augeo_user_end.item WHERE augeo_user_end.item.state = 0 LIMIt 4";
$result1 = $conn->query($sql1);


$sql3 = "SELECT * FROM augeo_user_end.item WHERE augeo_user_end.item.state = 0 ORDER BY augeo_user_end.item.expiration_date ASC LIMIt 4";
$result3 = $conn->query($sql3);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>AUGEO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="global/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="global/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link rel="stylesheet" href="http://localhost/augeo/global/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/topbar.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/footer.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/augeo/global/css/default.css">
		<link href="global/themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="global/themes/css/flexslider.css" rel="stylesheet"/>
		<link href="global/themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="global/themes/js/jquery-1.7.2.min.js"></script>
		<script src="global/bootstrap/js/bootstrap.min.js"></script>				
		<script src="global/themes/js/superfish.js"></script>	

		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		

		<div class="container-fluid">
		
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
                            <img src="global/themes/Auction-hammer-760x400.jpg" alt="" />
                            <div class="intro">
                                <h1>WELCOME TO AUGEO AUCTIONING SITE</h1>
                                <p><span>Be an Auctioner</span></p>
                                <p><span>Sell your Items</span></p>
                            </div>
							                            
    					</li>
						<li>
                            <img src="global/themes/Auction-paddles-760x400.jpg" alt="" />
                            <div class="intro">
                                <h1>Participate in Bidding</h1>
                                
                                <p><span>Lots of great items!</span></p>
                            </div>
						</li>
						<li>
							<img src="global/themes/ecommerce-2140604_1920-760x400.jpg" alt="" />
                            <div class="intro">
                                <h1>Easy Payment</h1>
                                <p><span>Pay with PayPal</span></p>
                                
                            </div>
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
				<h2><i>AUGEO - MAKING AUCTIONING EASIER</i></h2>
				<span><span class="text"><span class="line">AN <strong>AUCTIONING WEBSITE</strong></span></span></span>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>

								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	
											<?php 		
											while($row = $result->fetch_assoc()) {
												$item_id = $row['item_id'];
												$sql2 = "SELECT * FROM augeo_user_end.item_img WHERE augeo_user_end.item_img.item_id = $item_id";
												$result2 = $conn->query($sql2);
												while($row2 = $result2->fetch_assoc()) {
													$item_img = $row2['img_path']; 
												}
												$newDate2 = date("F d Y H:i:s", strtotime($row['expiration_date']));
												echo '								
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>
														<p><a href="item/view/?id='.$row['item_id'].'"><img src="'.$item_img.'" alt="" height="10px" width="200px"></a></p>
														<a href="#" class="title">'.$row['name'].'</a><br/>
														This Auction will end at:
														<a href="#" class="title">'.$newDate2.'</a><br/>
                                                        <a href="#" class="category">'.$row['description'].'</a>
														<p class="price">Php '.$row['initial_price'].'</p>
													</div>
												</li>';
											}
												?>
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
											
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Soon to end <strong>Auctions</strong></span></span></span>

								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	
											<?php 		
											while($row = $result3->fetch_assoc()) {
												$item_id = $row['item_id'];
												$sql2 = "SELECT * FROM augeo_user_end.item_img WHERE augeo_user_end.item_img.item_id = $item_id";
												$result2 = $conn->query($sql2);
												while($row2 = $result2->fetch_assoc()) {
													$item_img = $row2['img_path']; 
												}
												$newDate1 = date("F d Y H:i:s", strtotime($row['expiration_date']));
												echo '								
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>
														<p><a href="item/view/?id='.$row['item_id'].'"><img src="'.$item_img.'" alt="" height="10px" width="200px"></a></p>
														<a href="#" class="title">'.$row['name'].'</a><br/>
														This Auction will end at:
														<a href="#" class="title">'.$newDate1.'</a><br/>
                                                        <a href="#" class="category">'.$row['description'].'</a>
														<p class="price">Php '.$row['initial_price'].'</p>
													</div>
												</li>';
											}
												?>
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
											
										</div>
									</div>							
								</div>
							</div>						
						</div>
					</br>
						<div class="row">
							<div class="span12">
								
								<div class="row feature_box">						
							<div class="span4">
								<div class="service">
									<div class="responsive">	
										<img src="global/themes/images/feature_img_2.png" alt="" />
										<h4>QUICK <strong>SETUP</strong></h4>
										<p>Here in AUGEO, It is easier to sign up!</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="global/themes/images/feature_img_1.png" alt="" />
										<h4>EASY <strong>PAY</strong></h4>
										<p>It is now easier to pay via paypal</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="global/themes/images/feature_img_3.png" alt="" />
										<h4>AUCTIONEERS <strong>GUARANTEED</strong></h4>
										<p>All auctioneers are being checked 24/7</p>
									</div>
								</div>
							</div>	
						</div>	
							</div>						
						</div>

						<section class="our_client">
						<h4 class="title"><span class="pull-left"><span class="text"><span class="line">INTEGRATED WITH <strong>PAYPAL</strong></span></span></span></h4>
						<div class="row">					
							<div class="span4">
								<a href="#"><img src="http://localhost/augeo/global/img/bdg_now_accepting_pp_2line_w.png" border="0" alt="Now Accepting PayPal"></a>
							</div>
							<div class="span4">
								<a href="#"><img src="http://localhost/augeo/global/img/Security_Banner_150x100_4a.gif" border="0" alt="PayPal Logo"></a>
							</div>
							<div class="span4">
								<a href="#"><img src="http://localhost/augeo/global/img/FRS_151x101.jpg"></a>
							</div>
							
						</div>
			</section>
						
					</div>				
				</div>
			</section>
			
		</div>
		<script src="global/themes/js/common.js"></script>
		<script src="global/themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
		    <?php require $_SERVER['DOCUMENT_ROOT']."/augeo/global/php/footer.php"; ?>
    </body>
</html>