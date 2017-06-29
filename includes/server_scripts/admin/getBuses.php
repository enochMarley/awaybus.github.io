<?php  
	include "../dbConfig.php";

	$fetchQuery = "SELECT * FROM buses ORDER BY busType;";
	$fetchResult = $database->query($fetchQuery);
	if (mysqli_num_rows($fetchResult) > 0) {
		echo "<table class='table table-hover table-bordered'>
				<thead>
					<th>Bus Status</th>
					<th>Bus Type</th>
					<th>Reg. Number</th>
					<th>Number Of Seats</th>
					<th>Features</th>
					<th>Actions</th>
				</thead>
				<tbody>";
		while ($row = $fetchResult->fetch_assoc()) {
			$busId = $row["busId"];
			$busType = $row["busType"]; 
			$busNumber = $row["busNumber"]; 
			$busNumberOfSeats = $row["busNumberOfSeats"]; 
			$busStatus = $row["busStatus"]; 
			$busFeatures = $row["busFeatures"];?>

				<tr>
					<td><?php echo $busStatus; ?></td>
					<td><?php echo $busType; ?></td>
					<td><?php echo $busNumber; ?></td>
					<td><?php echo $busNumberOfSeats; ?></td>
					<td><?php echo substr($busFeatures,0,30); ?></td>
					<td>
					<i class="fa fa-trash-o" style="font-size: 22px;cursor: pointer;" onclick="removeBus(<?php echo $busId ?>,'<?php echo $busType ?>')"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="fa fa-edit" style="font-size: 22px;cursor: pointer;" onclick="editBus(<?php echo $busId ?>)"></i>
					</td>
				</tr>
					
<?php
		}
		echo "</tbody>
		</table>";
	}else{
		echo "<div class='jumbotron'>
			<h3 class='text-center'>Sorry, No Buses Have Been Added</h3>
		</div>";
	}
?>