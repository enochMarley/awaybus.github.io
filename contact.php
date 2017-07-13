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
			  <a href="#" class="selected">Contact</a>
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
				        <li class="selected"><a href="#">Contact</a></li>
				        <li><a href="login.php">Login</a></li>
				        <li><a href="signup.php">Sign Up</a></li>
				      </ul>
				    </div>
			  	</div>
			</nav>
			<br><br><br>
		<?php

			}else{

		?>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="book.php">Book Ticket</a>
		  <a href="services.php">Services</a>
		  <a href="about.php">About</a>
		  <a href="#" class="selected">Contact</a>
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
			        <li class="selected"><a href="#">Contact</a></li>
			        <li><a href="logout.php">Logout</a></li>
			      </ul>
			    </div>
		  	</div>
		</nav><br><br><br>
		<?php } ?>

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
