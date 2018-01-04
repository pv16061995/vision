<?php 
include 'config.php';
include 'apis/common.php';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	<title><?php echo PROJECT_TITLE;?></title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="fonts/flaticon.css" />
	<link rel="icon" type="image/png" href="images/favicon/favicon.png">
</head>

<body>
	<div class="boxed_wrapper">
		<div class="header-top">
			<div class="container clearfix">
				<!--Top Left-->
				<div class="top-left pull-left">
					<ul class="links-nav clearfix">
						<li><a href="#"><span class="fa fa-envelope"></span>Email:  info@visionex.com</a></li>
					</ul>
				</div>
				<!--Top Right-->
                    <div class="top-right pull-right">
					<div class="social-links clearfix">
						<a href="#"><span class="fa fa-facebook-f"></span></a>
						<a href="#"><span class="fa fa-twitter"></span></a>
						<a href="#"><span class="fa fa-linkedin"></span></a>
						<a href="#"><span class="fa fa-instagram"></span></a>
						<a href="#"><span class="fa fa-pinterest-p"></span></a>
					</div>
				</div>
			</div>
		</div><!-- Header Top End -->

		<div class="mainmenu-area stricky">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-md-4">
						<div class="main-logo">
							<a href="index.php"><img src="images/logo/logo.png" alt=""></a>
						</div>
					</div>
					<div class="col-md-5 menu-column">
						<nav class="main-menu">
				            <div class="navbar-header">     
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                </button>
				            </div>
				            <div class="navbar-collapse collapse clearfix">
				                <ul class="navigation clearfix">

				                    <li class="current"><a href="index.php">home</a></li>                 
				                    <li><a href="#about">about</a></li>
									<li><a href="#service">service</a></li>
									<li><a href="#">Blog</a></li>
 									<li><a href="#contact">Contact</a></li>
				                </ul>
			                    <ul class="mobile-menu clearfix">

				                    <li class="current"><a href="index.php">home</a></li>                 
				                    <li><a href="#about">about</a></li>
									<li><a href="#service">service</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#contact">Contact</a></li>

				                </ul>
				            </div>
				        </nav>
					</div>
					 <?php if(!isset($_SESSION['useremail'])){ ?>

                   <div class="col-md-3">
						<div class="right-area">
						   <div class="link_btn float_right">
							   <a href="login.php" class="thm-btn">Login</a>
							   <a href="signup.php" class="thm-btn">Sign up</a>
						   </div>

						</div>	
					</div>

                        <?php }else{ ?>
                        <div class="col-md-3">
						<div class="right-area">
						   <div class="link_btn float_right">
							   <a href="wallet.php" class="thm-btn">My Account</a>
							   <a href="logout.php" class="thm-btn">Logout</a>
						   </div>

						</div>	
					</div>
						<?php } ?>
		    	</div>
		        
		    </div>
		</div>


		