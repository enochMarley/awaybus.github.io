<?php  
	include "../dbConfig.php";

	$fetchQuery = "SELECT * FROM schedules ORDER BY scheduleId DESC;";
	$fetchResult = $database->query($fetchQuery);
	if (mysqli_num_rows($fetchResult) > 0) {
		echo "<table class='table table-hover table-bordered table-responsive'>
				<thead>
					<th>Status</th>
					<th>Route</th>
					<th>Bus Number</th>
					<th>Seats</th>
					<th>Booked</th>
					<th>Dep. Date</th>
					<th>Dep. Time</th>
					<th>Arr. Date</th>
					<th>Arr. Time</th>
					<th>Price(Adult)</th>
					<th>Price(Child)</th>
					<th>Actions</th>
				</thead>
				<tbody>";
		while ($row = $fetchResult->fetch_assoc()) {
			$scheduleId = $row["scheduleId"];
			$status = $row["scheduleDone"];
			$route = $row["route"];
			$busNumber = $row["busType"]; 
			$numberOfSeats = $row["numberOfSeats"]; 
			$seatsBooked = $row["seatsBooked"]; 
			$departureDate = $row["depDate"]; 
			$departureTime = $row["depTime"]; 
			$arrivalDate = $row["arrDate"];
			$arrivalTime = $row["arrTime"];
			$pricePerChild  = $row["pricePerChild"];
			$pricePerAdult  = $row["pricePerAdult"]; ?>

				<tr>
					<td>
						<?php
							if ($status == "false") {
								echo "<i class='fa fa-square'></i>";
							}elseif ($status == "true") {
								echo "<i class='fa fa-check-square'></i>";
							}
						?>
					</td>
					<td><?php echo $route; ?></td>
					<td><?php echo $busNumber; ?></td>
					<td><?php echo $numberOfSeats; ?></td>
					<td><?php echo $seatsBooked; ?></td>
					<td><?php echo $departureDate; ?></td>
					<td><?php echo $departureTime; ?></td>
					<td><?php echo $arrivalDate; ?></td>
					<td><?php echo $arrivalTime; ?></td>
					<td>GH&cent; <?php echo $pricePerAdult; ?></td>
					<td>GH&cent; <?php echo $pricePerChild; ?></td>
					<td>
					<i class="fa fa-trash-o" style="font-size: 22px;cursor: pointer;" onclick="removeSchedule(<?php echo $scheduleId ?>)"></i>&nbsp;&nbsp;
					<i class="fa fa-edit" style="font-size: 22px;cursor: pointer;" onclick="editSchedule(<?php echo $scheduleId ?>)"></i>
					</td>
				</tr>
					
<?php
		}
		echo "</tbody>
		</table>";
	}else{
		echo "<div class='jumbotron'>
			<h3 class='text-center'>Sorry, No Schedules Have Been Added</h3>
		</div>";
	}
?>