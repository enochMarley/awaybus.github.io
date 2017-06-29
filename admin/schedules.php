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
	    <link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">
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
								<li class="active"><a href="schedules.php" class="admin-menu-option"><i class="fa fa-clock-o"></i> Trip Schedules</a></li>	
								<li><a href="bookings.php"><i class="fa fa-calendar"></i> Bookings</a></li>
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

				<div class="col-md-10">
					<div class="panel panel-default menu-content">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a data-toggle="tab" href="#scheduleList">Upcoming Schedules</a></li>
							<li><a data-toggle="tab" href="#addSchedule">Add Schedule</a></li>
						</ul>
						<div class="tab-content">
							<div id="scheduleList" class="tab-pane fade in active">
								<br>
								<div class="container-fluid shedules-div"></div>
							</div>
							<div id="addSchedule" class="tab-pane fade">
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<form action="../includes/server_scripts/admin/addSchedule.php" class="input-form schedule-form" method="post">
											<br><br>
											<select name="busType" class="start-destination" required>
												<?php  
													include "../includes/server_scripts/dbConfig.php";

													$fetchQuery = "SELECT * FROM buses ORDER BY busType;";
													$fetchResult = $database->query($fetchQuery);
													if (mysqli_num_rows($fetchResult) > 0) {
														echo "<option selected disabled>Select Bus For Trip</option>";
														while ($row = $fetchResult->fetch_assoc()) {
															$busType = $row["busType"];
															$busNumber = $row["busNumber"];
															echo "<option value='$busNumber'>$busType</option>";
														}
													}else{
														echo "<option selected disabled>No Buses In Database</option>";
													}
												?>
											</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<select name="route" class="route" required>
												<?php  
													include "../includes/server_scripts/dbConfig.php";
													

													$fetchQuery = "SELECT * FROM routes ORDER BY routePath;";
													$fetchResult = $database->query($fetchQuery);
													if (mysqli_num_rows($fetchResult) > 0) {
														echo "<option selected disabled>Select Route</option>";
														while ($row = $fetchResult->fetch_assoc()) {
															$route = $row["routePath"];
															echo "<option value='$route'>$route</option>";
														}
													}else{
														echo "<option selected disabled>No Routes Available</option>";
													}
												?>
											</select><br><br><br>

											<input type="text" class="dep-date" name="departureDate" placeholder="Departure Date">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="text" name="departureTime" placeholder="Departure Time"><br><br><br>
											<input type="text" class="arr-date" name="arrivalDate" placeholder="Arrival Date">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="text" name="arrivalTime" placeholder="Arrival Time"> <br><br><br>
											<input type="number" min="1" name="pricePerAdult" placeholder="Price Per Adult">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="number" min="1" name="pricePerChild" placeholder="Price Per Child"> <br><br><br>
											<button type="submit" class="btn btn-info btn-lg add-btn"><i class="fa fa-plus"></i> Add Schedule</button>
										</form>
									</div>
									<div class="col-md-2"></div>
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
	    <script src="../js/bootstrap-datepicker.min.js"></script>
	    <script src="../js/admStyles.js"></script>
	</body>
</html>