<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Away Bus</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	    <link rel="stylesheet" href="css/font-awesome.min.css">
	    <link rel="stylesheet" href="css/jquery-ui-theme.css">
	    <link rel="stylesheet" href="css/user_styles.css">
	    <link rel="stylesheet" href="css/jquery.timepicker.css">
	    <link rel="stylesheet" href="css/animate.css">
	</head>
	<body>
		<?php
			session_start();
			$_SESSION['prev_page'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			if(!isset($_SESSION["username"])){
				if (!isset($_SESSION["temp_username"])) {
				 	$_SESSION["temp_username"] = time();
				 } ?>

			<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <a href="book.php">Book Ticket</a>
			  <a href="services.php">Services</a>
			  <a href="about.php">About</a>
			  <a href="contact.php">Contact</a>
			  <a href="login.php">Login</a>
			  <a href="signup.php">Signup</a>
			</div>

			<nav class="navbar navbar-inverse navbar-fixed-top wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.1s">
			  	<div class="container-fluid">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle menuBtn" onclick="openNav()">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="index.php">AwayBus<sup>&reg;</sup></a>
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav  navbar-right">
				        <li><a href="book.php" class="home-navbar-init-text">Book Ticket</a></li>
				        <li><a href="services.php">Services</a></li>
				        <li><a href="about.php">About</a></li>
				        <li><a href="contact.php">Contact</a></li>
				        <li><a href="login.php">Login</a></li>
				        <li><a href="signup.php">Sign Up</a></li>
				      </ul>
				    </div>
			  	</div>
			</nav>

		<?php

			}else{

		?>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="book.php">Book Ticket</a>
		  <a href="services.php">Services</a>
		  <a href="about.php">About</a>
		  <a href="contact.php">Contact</a>
		  <a href="logout.php">Logout</a>
		</div>

		<nav class="navbar navbar-inverse navbar-fixed-top wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.1s">
		  	<div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle menuBtn" onclick="openNav()">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.php">AwayBus<sup>&reg;</sup></a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav  navbar-right">
			        <li><a href="book.php" class="home-navbar-init-text">Book Ticket</a></li>
			        <li><a href="services.php">Services</a></li>
			        <li><a href="about.php">About</a></li>
			        <li><a href="contact.php">Contact</a></li>
			        <li><a href="logout.php">Logout</a></li>
			      </ul>
			    </div>
		  	</div>
		</nav>
		<?php } ?>
		<div class="container-fluid parallax-window" data-parallax="scroll" data-image-src="includes/images/bus.png">
			<br><br><br><br><br>
			<h1 class="intro-text text-center"></h1>
			<br><br><br>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<a href="#book-now-div"><button class="btn btn-black btn-lg  intro-btn" ><i class="fa fa-calendar"></i> Book Now</button></a>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<div class="container-fluid intro-sm-cont">
			<br><br>
			<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="intro-sm-text-div wow fadeIn"  data-wow-duration="1s" data-wow-delay="0.3s">
						<h1 class="text-center"><i class="fa fa-star"></i></h1>
						<p class="text-center">
							<h4 class="text-center"><strong>Excellent Services</strong></h4>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-sm-text-div wow fadeIn"  data-wow-duration="1s" data-wow-delay="0.4s">
						<h1 class="text-center"><i class="fa fa-handshake-o"></i></h1>
						<p class="text-center">
							<h4 class="text-center"><strong>100% Customer Satisfaction</strong></h4>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-sm-text-div wow fadeIn"  data-wow-duration="1s" data-wow-delay="0.5s">
						<h1 class="text-center"><i class="fa fa-mobile-phone"></i></h1>
						<p class="text-center">
							<h4 class="text-center"><strong>Get the AwayBus<sup>&reg;</sup> App</strong></h4>

						</p>
					</div>
				</div>
			</div>
			</div><br><br>
		</div>
		<div class="container-fluid" id="book-now-div">
			<h1 class="text-center">BOOK TICKET NOW</h1><br>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default menu-content">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a data-toggle="tab" href="#one-trip">One Trip</a></li>
							<li><a data-toggle="tab" href="#return-trip">Return Trips</a></li>
						</ul>
						<div class="tab-content"><br>
							<div id="one-trip" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<form  method="post" class="user-form one-trip-form">
											<input type="hidden" value="oneTrip" name="tripType">
											<div class="row">
												<div class="col-md-6">
													<label>Departure</label><br>
													<select name="departure" class="dep-select" required>
														<?php include "includes/server_scripts/users/getDestinationOptions.php"; ?>
													</select><br><br>
												</div>
												<div class="col-md-6">
													<label>Destination</label><br>
													<select name="destination" class="dest-select" required>
														<?php include "includes/server_scripts/users/getDestinationOptions.php"; ?>
													</select><br><br>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-6">
													<label>Departure Date</label><br>
													<input type="text" name="depDate" class="date-input" required>
												</div>
												<div class="col-md-6">
													<label>Number Of Adults</label><br>
													<input type="number" value="0" min="0" name="numberOfAdults" class="number-of-adults" required>
												</div>
											</div><br><br>
											<div class="row">
												<div class="col-md-6">
													<label>Number Of Children</label><br>
													<input type="number" value="0" min="0" name="numberOfChildren" class="number-of-children" required>
												</div>
												<div class="col-md-6"><br>
													<button type="submit" class="btn btn-black btn-lg"><i class="fa fa-search"></i> Search</button>
												</div>
											</div><br>
										</form> <br><br>
									</div>
									<div class="col-md-2"></div>
								</div>
							</div>
							<div id="return-trip" class="tab-pane fade">
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<form method="post" class="user-form return-trip-form">
											<div class="row">
												<div class="col-md-6">
													<label>Departure</label><br>
													<select name="departure" class="ret-dep-select">
														<?php include "includes/server_scripts/users/getDestinationOptions.php"; ?>
													</select><br><br>
												</div>
												<div class="col-md-6">
													<label>Destination</label><br>
													<select name="destination" class="ret-dest-select">
														<?php include "includes/server_scripts/users/getDestinationOptions.php"; ?>
													</select><br><br>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-6">
													<label>Departure Date</label><br>
													<input type="text" name="depDate" class="date-input dep-date" required>
												</div>
												<div class="col-md-6">
													<label>Number Of Adults On Departure</label><br>
													<input type="number" value="0" min="0" name="numberOfAdults" class="dep-num-of-adults" required>
												</div>
											</div><br><br>
											<div class="row">
												<div class="col-md-6">
													<label>Number Of Children On Departure</label><br>
													<input type="number" value="0" min="0" name="numberOfChildren" class="dep-num-of-children" required>
												</div>
												<div class="col-md-6">
													<label>Return Date</label><br>
													<input type="text" name="arrDate" class="date-input ret-date" required>
												</div>
											</div><br><br>
											<div class="row">
												<div class="col-md-6">
													<label>Number Of Adults On Return</label><br>
													<input type="number" value="0" min="0" name="numberOfAdults" class="ret-num-of-adults" required>
												</div>
												<div class="col-md-6">
													<label>Number Of Children On Return</label><br>
													<input type="number" value="0" min="0" name="numberOfChildren" class="ret-num-of-children" required>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12"><br>
													<button type="submit" class="btn btn-black btn-lg"><i class="fa fa-search"></i> Search</button>
												</div>
											</div><br>
										</form> <br><br>
									</div>
									<div class="col-md-2"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="container-fluid trip-res-div" id="trip-result-div"></div>
		<div class="container-fluid price-route-cont">
			<h3 class="text-center"><strong>Our Trip Pricing</strong></h3>
			<div class="row">
				<div class="col-md-4">
					<div class="price-div">
						<img src="includes/images/accra.png" alt="accra"/><br><br>
						<div class="row">
							<div class="col-md-1">
								<div class="price-route-div">
									<img src="includes/images/route.png" alt="route">
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<p><strong>Accra <br>Kumasi</strong></p>
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<button type="button" class="btn btn-black">GH&cent; 10</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="price-div">
						<img src="includes/images/kumasi.png" alt="accra"/><br><br>
						<div class="row">
							<div class="col-md-1">
								<div class="price-route-div">
									<img src="includes/images/route.png" alt="route">
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<p><strong>Kumasi <br>Takoradi</strong></p>
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<button type="button" class="btn btn-black">GH&cent; 15</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="price-div">
						<img src="includes/images/tamale.png" alt="accra"/><br><br>
						<div class="row">
							<div class="col-md-1">
								<div class="price-route-div">
									<img src="includes/images/route.png" alt="route">
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<p><strong>Tamale <br>Kumasi</strong></p>
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<button type="button" class="btn btn-black">GH&cent; 15</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-4">
					<div class="price-div">
						<img src="includes/images/takoradi.png" alt="accra"/><br><br>
						<div class="row">
							<div class="col-md-1">
								<div class="price-route-div">
									<img src="includes/images/route.png" alt="route">
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<p><strong>Takoradi <br>Accra</strong></p>
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<button type="button" class="btn btn-black">GH&cent; 10</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="price-div">
						<img src="includes/images/wa.png" alt="accra"/><br><br>
						<div class="row">
							<div class="col-md-1">
								<div class="price-route-div">
									<img src="includes/images/route.png" alt="route">
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<p><strong>Wa <br>Tamale</strong></p>
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<button type="button" class="btn btn-black">GH&cent; 15</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="price-div">
						<img src="includes/images/ho.png" alt="accra"/><br><br>
						<div class="row">
							<div class="col-md-1">
								<div class="price-route-div">
									<img src="includes/images/route.png" alt="route">
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<p><strong>Ho <br>Accra</strong></p>
								</div>
							</div>
							<div class="col-md-5">
								<div class="price-route-div">
									<button type="button" class="btn btn-black">GH&cent; 15</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br><br><br>
		</div>
		<div class="container-fluid footer-div"><br>
			<div class="row">
				<div class="col-md-3">
					<h4 class="text-center foot-head-text"><strong>Pages</strong></h4>
					<ul class="foot-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="book.php">Book Ticket</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>

				<div class="col-md-3">
					<h4 class="text-center foot-head-text"><strong>Customer Service</strong></h4>
					<ul class="foot-list">
						<li><a href="#">FAQ</a></li>
					</ul>
				</div>

				<div class="col-md-3">
					<h4 class="text-center foot-head-text"><strong>Follow Us On:</strong></h4>
					<a href="#"><img src="includes/images/face book.png" class=" soc-img" alt="fb_logo"></a>
					<a href="#"><img src="includes/images/instagram.png" class=" soc-img" alt="fb_logo"></a>
					<a href="#"><img src="includes/images/twitter.png" class=" soc-img" alt="fb_logo"></a>
					<a href="#"><img src="includes/images/g+.png" class=" soc-img" alt="fb_logo"></a>
					<a href="#"><img src="includes/images/linked in.png" class=" soc-img" alt="fb_logo"></a>
				</div>
				<div class="col-md-3">
					<h4 class="text-center foot-head-text"><strong>Pay Securely With</strong></h4>
					<a href="#"><img src="includes/images/paywith.png" class="img-responsive paywith-img" alt="fb_logo"></a>
				</div>
			</div>
			<div class="row">
				<h5 class="text-center foot-head-text">AwayBus<sup>&reg; </sup> | All Rights Reserved | &copy;<?php echo date('Y') ?></h5>
			</div>
		</div>
		<script src="js/jquery2.2.4.min.js"></script>
	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/bootstrap-datepicker.min.js"></script>
	    <script src="js/jquery.timepicker.min.js"></script>
	    <script src="js/parallax.min.js"></script>
	    <script src="js/wow.min.js"></script>
	    <script src="js/usSstyles.js"></script>
	</body>
</html>
