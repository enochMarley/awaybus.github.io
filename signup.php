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
		  <a href="login.php">Login</a>
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
			        <li><a href="login.php">Login</a></li>
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
							<input type="text" name="fullName" placeholder="Full Name" required><br><br>
							<input type="text" name="username" placeholder="Username" required><br><br>
							<input type="text" name="birthDate" placeholder="Date Of Birth" class="user-Ddate" required><br><br>
							<input type="email" name="email" placeholder="Email Address" required><br><br>
							<input type="number" name="phone" placeholder="Phone Number" required><br><br>
							<input type="password" name="password" placeholder="Password" required><br><br>
							<input type="password" name="passwordConf" placeholder="Confirm Password" required><br><br>
							<button type="submit" class="btn btn-info btn-lg">Sign Up</button>
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
	$fullName = $database->real_escape_string(trim($_POST["fullName"]));
	$username = $database->real_escape_string(trim($_POST["username"]));
	$birthDate = $database->real_escape_string(trim($_POST["birthDate"]));
	$email = $database->real_escape_string(trim($_POST["email"]));
	$phone = $database->real_escape_string(trim($_POST["phone"]));
	$password = $database->real_escape_string(trim($_POST["password"]));
	$passwordConf = $database->real_escape_string(trim($_POST["passwordConf"]));

	if (isset($fullName) && isset($username) && isset($birthDate) && isset($email) && isset($phone) && isset($password) && isset($passwordConf) ) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (strlen($password) < 8) {
				echo "<script>alert('Password Must Be At Least Eight (8) Characters Long')</script>";
			}elseif ($password != $passwordConf) {
				echo "<script>alert('The Passwords You Provided Do Not Match')</script>";
			}else{
				$checkQuery = "SELECT * FROM users WHERE username = '$username' OR emailAddress = '$email'OR phoneNumber = '$phone';";
				$checkResult = $database->query($checkQuery);
				if (mysqli_num_rows($checkResult) > 0) {
					$row = $checkResult->fetch_assoc();
					if ($row["username"] == "$username") {
						echo "<script>alert('Username Already Chosen')</script>";
					}elseif ($row["emailAddress"] == "$email") {
						echo "<script>alert('Email Address Already Used By Another User')</script>";
					}elseif ($row["phoneNumber"] == "$phone") {
						echo "<script>alert('Phone Number Already Used By Another User')</script>";
					}
				}else{
					$insertQuery = "INSERT INTO users(fullName,username,dateOfBirth,emailAddress,phoneNumber,passcode) VALUES('$fullName','$username','$birthDate','$email','$phone','$password');";

					$insertResult = $database->query($insertQuery);
					if ($insertResult) {
						echo "<script>alert('Sign Up Successful');window.location.href = 'login.php'</script>";
					}else{
						echo "<script>alert('Sorry An Error Occured. Please Try Again');window.location.href = 'login.php'</script>";
					}
				}
			}
		}
	}

?>