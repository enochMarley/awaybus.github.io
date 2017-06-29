<?php  
	include "../dbConfig.php";

	$busType = $database->real_escape_string(trim($_POST["typeOfBus"]));
	$busNumber = $database->real_escape_string(trim($_POST["regnumberOfBus"]));
	$numberOfSeats = $database->real_escape_string(trim($_POST["numberOfSeats"]));
	$busFeatures = $database->real_escape_string(trim($_POST["busFeatures"]));

	$searchQuery = "SELECT * FROM buses WHERE busType = '$busType' AND busNumber = '$busNumber' AND busNumberOfSeats = $numberOfSeats AND busFeatures = '$busFeatures';";

	$searchResult = $database->query($searchQuery);
	if (mysqli_num_rows($searchResult) > 0) {
		echo "<script>alert('The Bus Already Exists');window.location.href='../../../admin/buses.php';</script>";
	}else{
		$insertQuery = "INSERT INTO buses(busType,busNumber,busNumberOfSeats,busFeatures) VALUES('$busType','$busNumber',$numberOfSeats,'$busFeatures');";
		$insertResult = $database->query($insertQuery);
		if ($insertQuery) {
			echo "<script>alert('The Bus Added Successfully');window.location.href='../../../admin/buses.php';</script>";
		}else{
			echo "<script>alert('Sorry,Bus Could Not Be Added');window.location.href='../../../admin/buses.php';</script>";
		}
	}

?>