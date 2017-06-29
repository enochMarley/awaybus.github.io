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
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 sidenav">
					<div class="panel panel-default">
						<div class="panel-heading"><strong class="text-center">Menu</strong></div>
						<div class="panel-content">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="schedules.php"><i class="fa fa-clock-o"></i> Trip Schedules</a></li>	
								<li class="active"><a href="bookings.php"  class="admin-menu-option"><i class="fa fa-calendar"></i> Bookings</a></li>
								<li><a href="buses.php"><i class="fa fa-bus"></i> Buses</a></li>	
								<li><a href="destinations.php"><i class="fa fa-map-marker"></i> Destinations</a></li>
								<li><a href="routes.php"><i class="fa fa-exchange"></i> Routes</a></li>	
								<hr>
								<li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>	
								<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>	
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-10"></div>
			</div>
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