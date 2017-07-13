<?php
	include "../dbConfig.php";
	$departureLocation = trim($_POST["departureLocation"]);
	$destinationLocation = trim($_POST["destinationLocation"]);
	$departureDate = trim($_POST["departureDate"]);
	$depNumberOfAdults = intval(trim($_POST["depNumberOfAdults"]));
	$depNumberOfChildren = intval(trim($_POST["depNumberOfChildren"]));
	$returnDate = trim($_POST["returnDate"]);
	$retNumberOfAdults = intval(trim($_POST["retNumberOfAdults"]));
	$retNumberOfChildren = intval(trim($_POST["retNumberOfChildren"]));
	$totalNumberOfPeople = $depNumberOfAdults + $depNumberOfChildren;

	$route = trim($departureLocation." To ".$destinationLocation);

	$query = "SELECT * FROM schedules WHERE route = '$route' AND depDate = '$departureDate' AND arrDate = '$returnDate';";
	$result = $database->query($query);
	if (mysqli_num_rows($result) > 0) {
		echo "<h3 class='text-center'>Available Tickets Matching Your Request</h3><br>";
		while ($row = $result->fetch_assoc()) {
			$scheduleId = $row["scheduleId"];
			$busType = $row["busType"];
			$travelRoute = $row["route"];
			$departureDate = $row["depDate"];
			$departureTime = $row["depTime"];
            $returnDate = $row["arrDate"];
            $returnTime = $row["arrTime"];
			$pricePerAdult = $row["pricePerAdult"];
			$pricePerChild = $row["pricePerChild"];
			$numberOfSeats = $row["numberOfSeats"];
			if ($totalNumberOfPeople > $numberOfSeats) {?>

				<div class="col-md-3">
					<div class="card-div">
						<div class=" alert alert-danger">
							<p class="text-left"><strong>Route:</strong><br><?php echo $travelRoute; ?> &amp; back</p>
							<p class="text-left"><strong>Departure Date:</strong><br><?php echo $departureDate; ?></p>
							<p class="text-left"><strong>Departure Time:</strong><br><?php echo $departureTime; ?></p>
							<p class="text-left"><strong>Return Date:</strong><br><?php echo $returnDate; ?></p>
							<p class="text-left"><strong>Return Time:</strong><br><?php echo $returnTime; ?></p>
							<p class="text-left"> ** Only <strong><?php echo $numberOfSeats; ?> </strong> Seats Available **</p>
						</div>
						<button class="btn btn-info book-btn" disabled><i class="fa fa-info-circle"></i> Please Change Seat Request</button>
					</div>
				</div>
<?php
			}elseif ($totalNumberOfPeople <= $numberOfSeats) { ?>
				<div class="col-md-3">
					<div class="card-div">
						<div class=" alert alert-info">
							<p class="text-left"><strong>Route:</strong><br><?php echo $travelRoute; ?> &amp; back</p>
							<p class="text-left"><strong>Departure Date:</strong><br><?php echo $departureDate; ?></p>
							<p class="text-left"><strong>Departure Time:</strong><br><?php echo $departureTime; ?></p>
                            <p class="text-left"><strong>Return Date:</strong><br><?php echo $returnDate; ?></p>
							<p class="text-left"><strong>Return Time:</strong><br><?php echo $returnTime; ?></p>
							<p class="text-left"><strong><?php echo $numberOfSeats; ?> </strong> Seats Available</p>
						</div>
						<button onclick="bookReturnBus(<?php echo $scheduleId; ?>,<?php echo $depNumberOfAdults;?>,<?php echo $depNumberOfChildren;?>,
                            <?php echo $retNumberOfAdults;?>,<?php echo $retNumberOfChildren;?>)" class="btn btn-info book-btn"><i class="fa fa-shopping-cart"></i> Book Now</button>
					</div>
				</div>
<?php
			}
		}
	}else{
			$notQuery = "SELECT * FROM schedules WHERE route = '$route' AND depDate > '$departureDate';";
			$notResult  = $database->query($notQuery);
			if (mysqli_num_rows($notResult) > 0) {
				echo "<h3 class='text-center'>No Results Were Found For Your Reservation Request<br>Have A Look At Alternative Schedules</h3><br>";
				while ($row = $notResult->fetch_assoc()) {
					$scheduleId = $row["scheduleId"];
					$busType = $row["busType"];
					$travelRoute = $row["route"];
					$departureDate = $row["depDate"];
					$departureTime = $row["depTime"];
                    $returnDate = $row["arrDate"];
                    $returnTime = $row["arrTime"];
					$pricePerAdult = $row["pricePerAdult"];
					$pricePerChild = $row["pricePerChild"];
					$numberOfSeats = $row["numberOfSeats"]; ?>

					<div class="col-md-3">
					<div class="card-div">
						<div class=" alert alert-warning">
							<p class="text-left"><strong>Route:</strong><br><?php echo $travelRoute; ?> &amp; back</p>
							<p class="text-left"><strong>Departure Date:</strong><br><?php echo $departureDate; ?></p>
							<p class="text-left"><strong>Departure Time:</strong><br><?php echo $departureTime; ?></p>
                            <p class="text-left"><strong>Return Date:</strong><br><?php echo $returnDate; ?></p>
							<p class="text-left"><strong>Return Time:</strong><br><?php echo $returnTime; ?></p>
							<p class="text-left"><strong><?php echo $numberOfSeats; ?> </strong> Seats Available</p>
						</div>
						<button onclick="bookReturnBus(<?php echo $scheduleId; ?>,<?php echo $depNumberOfAdults;?>,<?php echo $depNumberOfChildren;?>,
                            <?php echo $retNumberOfAdults;?>,<?php echo $retNumberOfChildren;?>)" class="btn btn-info book-btn"><i class="fa fa-shopping-cart"></i> Book Now</button>
					</div>
				</div>
<?php
				}

			}else{
				echo "<div class='jumbotron'><h3 class='text-center'>No Results Were Found For Your Reservation Request</h3></div>";
			}
	}

?>
