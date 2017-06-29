<?php  
	include "../dbConfig.php";

	$busId = $database->real_escape_string(trim($_POST["busId"]));
	$busType = $database->real_escape_string(trim($_POST["typeOfBus"]));
	$busNumber = $database->real_escape_string(trim($_POST["regnumberOfBus"]));
	$numberOfSeats = $database->real_escape_string(trim($_POST["numberOfSeats"]));
	$busFeatures = $database->real_escape_string(trim($_POST["busFeatures"]));

	$updateQuery = "UPDATE buses SET busType = '$busType', busNumber = '$busNumber', busNumberOfSeats = $numberOfSeats, busFeatures = '$busFeatures' WHERE busId = $busId;";

	$updateResult = $database->query($updateQuery);
	if ($updateResult) {
		echo "<script>alert('Details Updated Successfully');window.location.href='../../../admin/buses.php';</script>";
	}else{
		echo "<script>alert('Could Not Update Details');window.location.href='../../../admin/buses.php';</script>";
	}		

?>