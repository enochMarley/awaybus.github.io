<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Away Bus</title>
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	    <link rel="stylesheet" href="css/font-awesome.min.css">
	    <link rel="stylesheet" href="css/jquery-ui-theme.css">
	    <link rel="stylesheet" href="css/user_styles.css">
	</head>
	<body>

		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="#">Home</a>
		  <a href="signup.php">Sign Up</a>
		  <a href="#">About</a>
		  <a href="#">Contact</a>
		</div>

		<nav class="navbar navbar-inverse navbar-fixed-top">
		  	<div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle menuBtn" onclick="openNav()">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">AwayBus</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav  navbar-right">
			        <li><a href="index.php">Home</a></li>
			        <li><a href="signup.php">Sign Up</a></li>
			        <li><a href="#">About</a></li>
			        <li><a href="#">Contact</a></li>
			      </ul>
			    </div>
		  	</div>
		</nav><br><br><br><br><br>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="card-div">
						<form action="" method="post" class="user-form">
							<br>
							<p class="resMsg text-center"></p>
							<input type="email" name="email" placeholder="Email Address" required><br><br>
							<input type="password" name="password" placeholder="Password" required><br><br>
							<button type="submit" class="btn btn-info btn-lg">Login</button>
							<br><br>
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
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
<?php  
	error_reporting(0);
	include "includes/server_scripts/dbConfig.php";
	$email = $database->real_escape_string(trim($_POST["email"]));
	$passcode = $database->real_escape_string(trim($_POST["password"]));

	//query string to query database
	if (isset($email) && isset($passcode)) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$loginQuery = "SELECT * FROM  users WHERE emailAddress = '$email' AND passcode = '$passcode';";

			$loginQueryResult = $database->query($loginQuery);

			if (mysqli_num_rows($loginQueryResult) > 0) {
				$row = $loginQueryResult->fetch_assoc();
				session_start();
				$_SESSION["username"] = $row["username"];
				
				echo "<script>
					$('.resMsg').html('Login Successful').css('color','#0f0');
					setTimeout(function(){
						window.location.href = '".$_SESSION['prev_page']."';
					},1000);
				</script>";

			}else{
				echo "<script>
					$('.resMsg').html('Login Failed. Wrong email Or Password').css('color','#f00');
					$('.card-div').effect('shake','slow');
				</script>";
			}
		}
	}
	
?>