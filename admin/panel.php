<?php  
	session_start();
	if (!isset($_SESSION["adminUsername"])) {
		echo "<script>window.location.href = 'index.php';</script>";
	}
?>
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
		<nav class="navbar navbar-default navbar-fixed-top">
		  	<div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">AwayBus | Admin Panel</a>
			    </div>
		  	</div>
		</nav> 
		<br><br><br>
		<div class="container">
				<h3 class="text-center">Select An Activity From The Options Below</h3><br>
				<a href="bookings.php">
					<div class="col-md-3 panel-option-div">
						<span class="opt-text">
							<h3><i class="fa fa-calendar"></i><br>Bookings</h3>
						</span>
					</div>
				</a>
				
				<a href="buses.php">
					<div class="col-md-3 panel-option-div">
						<span class="opt-text">
							<h3><i class="fa fa-bus"></i><br>Buses</h3>
						</span>
					</div>
				</a>

				<a href="destinations.php">
					<div class="col-md-3 panel-option-div">
						<span class="opt-text">
							<h3><i class="fa fa-map-marker"></i><br>Destinations</h3>
						</span>
					</div>
				</a>

				<a href="routes.php">
					<div class="col-md-3 panel-option-div">
						<span class="opt-text">
							<h3><i class="fa fa-exchange"></i><br>Routes</h3>
						</span>
					</div>
				</a>

				<a href="schedules.php">
					<div class="col-md-3 panel-option-div">
						<span class="opt-text">
							<h3><i class="fa fa-clock-o"></i><br>Schedules</h3>
						</span>
					</div>
				</a>

				<a href="users.php">
					<div class="col-md-3 panel-option-div">
						<span class="opt-text">
							<h3><i class="fa fa-users"></i><br>Users</h3>
						</span>
					</div>
				</a>

				<a href="logout.php">
					<div class="col-md-3 panel-option-div">
						<span class="opt-text">
							<h3><i class="fa fa-power-off"></i><br>Logout</h3>
						</span>
					</div>
				</a>

		</div>
		<div class="container navbar-fixed-bottom">
			<p class="text-center">Copyright AwayBus <sup>&reg;</sup>  - All Rights Reserved | &copy; <?php echo date('Y'); ?></p>
		</div>
		<script src="../js/jquery2.2.4.min.js"></script>
	    <script src="../js/jquery-ui.min.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
	    <script src="../js/admStyles.js"></script>
	</body>
</html>