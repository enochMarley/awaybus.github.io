<?php 
	session_start();
	if (!isset($_SESSION["adminUsername"])) {
		echo "<script>window.location.href = 'index.php';</script>";
	}
	include "../includes/server_scripts/dbConfig.php";
	$busId = intval($_GET["id"]);
	$getQuery = "SELECT * FROM buses WHERE busId = $busId;";
	$getResult = $database->query($getQuery);
	if(mysqli_num_rows($getResult) > 0){
		$row = $getResult->fetch_assoc();
		$busType = $row["busType"];
		$busNumberOfSeats = $row["busNumberOfSeats"];
		$busNumber = $row["busNumber"];
		$busFeatures = $row["busFeatures"];
	
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
								<li><a href="bookings.php"><i class="fa fa-calendar"></i> Bookings</a></li>
								<li class="active"><a href="buses.php" class="admin-menu-option"><i class="fa fa-bus"></i> Buses</a></li>	
								<li><a href="destinations.php"><i class="fa fa-map-marker"></i> Destinations</a></li>
								<li><a href="routes.php"><i class="fa fa-exchange"></i> Routes</a></li>	
								<hr>
								<li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>	
								<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>	
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-10">
					<div class="panel panel-default menu-content">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a data-toggle="tab" href="#editBus">Edit Bus</a></li>
						</ul>
						<div class="tab-content">
							<div id="addBus" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<form action="../includes/server_scripts/admin/editBus.php" class="input-form dest-form" method="post">
											<br><br>
											<input type="hidden" value="<?php echo $busId; ?>" name="busId">
											<input type="text" name="typeOfBus" placeholder="Type Of Bus" value="<?php echo $busType; ?>" required><br><br>
											<input type="text" name="regnumberOfBus" placeholder="Registration Number" value="<?php echo $busNumber; ?>" required><br><br>
											<input type="number" min="1" name="numberOfSeats" placeholder="Number Of Seats" value="<?php echo $busNumberOfSeats; ?>" required><br><br>
											<input name="busFeatures" placeholder="Features Of Bus" value="<?php echo $busFeatures; ?>" required><br><br>
											<button type="submit" class="btn btn-info btn-lg add-btn"><i class="fa fa-refresh"></i> Update Bus Details</button>
										</form>
									</div>
									<div class="col-md-3"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
	}else{
		echo "<script>window.location.href = 'buses.php';</script>";
	}

?>