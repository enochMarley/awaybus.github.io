<?php  
	include "../dbConfig.php";

	$fetchQuery = "SELECT * FROM destinations ORDER BY destinationName;";
	$fetchResult = $database->query($fetchQuery);
	if (mysqli_num_rows($fetchResult) > 0) {
		while ($row = $fetchResult->fetch_assoc()) {
			$destinationId = $row["destinationId"];
			$destinationName = $row["destinationName"]; ?>

			
			<div class='col-md-3'>
				<div class='alert alert-info'>
					<?php echo $destinationName; ?> <span style='float:right'>
					<i class='fa fa-trash-o' style='cursor:pointer;' onclick="removeDestination(<?php echo $destinationId; ?>,'<?php echo $destinationName; ?>')"></i>&nbsp;&nbsp;&nbsp;
				</div>
			</div>
<?php
		}
	}else{
		echo "<div class='jumbotron'>
			<h3 class='text-center'>Sorry, No Destinations Have Been Added</h3>
		</div>";
	}
?>