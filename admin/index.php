<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>AwayBus</title>
	    <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <link rel="stylesheet" href="../css/font-awesome.min.css">
	    <link rel="stylesheet" href="../css/jquery-ui-theme.css">
	    <link rel="stylesheet" href="../css/styles.css">

	</head>
	<body>
		<div class="container-fluid">
			<br><br><br><br><br><br>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="card-div">
						<form action="" method="post" enctype="multipart/form-data" class="input-form">
							<br>
							<h3>AwayBus - Admin Login</h3>
							<p class="resMsg"></p>
							<input type="text" name="adminUsername" placeholder="Admin Username" required><br><br>
							<input type="password" name="adminPassword" placeholder="Admin Password" required><br><br>
							<button type="submit" class="btn btn-info btn-lg"><i class="fa fa-key"></i> Login</button><br><br>
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<div class="container navbar-fixed-bottom">
			<p class="text-center">Copyright AwayBus <sup>&reg;</sup>  - All Rights Reserved | &copy; <?php echo date('Y'); ?></p>
		</div>
		<script src="../js/jquery2.2.4.min.js"></script>
	    <script src="../js/jquery-ui.min.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>
<?php  
	error_reporting(0);
	include "../includes/server_scripts/dbConfig.php";
	$adminUsername = $database->real_escape_string(trim($_POST["adminUsername"]));
	$adminPassword = $database->real_escape_string(trim($_POST["adminPassword"]));
	$response = array();

	//query string to query database
	if (isset($adminUsername) && isset($adminPassword)) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$loginQuery = "SELECT * FROM  admin WHERE adminUsername = '$adminUsername' AND adminPassword = '$adminPassword';";

			$loginQueryResult = $database->query($loginQuery);

			if (mysqli_num_rows($loginQueryResult) > 0) {
				session_start();
				$_SESSION["adminUsername"] = $adminUsername;
				
				echo "<script>
					$('.resMsg').html('Login Successful').css('color','#0f0');
					setTimeout(function(){
						window.location.href = 'panel.php';
					},1000);
				</script>";

			}else{
				echo "<script>
					$('.resMsg').html('Login Failed. Wrong Username Or Password').css('color','#f00');
					$('.card-div').effect('shake','slow');
				</script>";
			}
		}
	}
	
?>