<?php  
	include "../dbConfig.php";

	$scheduleId = $_POST["scheduleId"];
	$busType = $_POST["busType"];
	$route = $_POST["route"];
	$departureDate = $_POST["departureDate"];
	$departureTime = $_POST["departureTime"];
	$arrivalDate = $_POST["arrivalDate"];
	$arrivalTime = $_POST["arrivalTime"];
	$pricePerAdult = $_POST["pricePerAdult"];
	$pricePerChild = $_POST["pricePerChild"];

	if (isset($busType) && isset($route) && isset($departureDate) && isset($departureTime) && isset($arrivalDate) && isset($arrivalTime) && isset($pricePerAdult) && isset($pricePerChild)) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$updateQuery = "UPDATE schedules SET busType = '$busType' , route = '$route' , depDate = '$departureDate' , depTime = '$departureTime' , arrDate = '$arrivalDate' , arrTime = '$arrivalTime' , pricePerAdult = $pricePerAdult , pricePerChild = $pricePerChild WHERE scheduleId = $scheduleId;";

			$updateResult = $database->query($updateQuery);
			if ($updateResult) {
				echo "<script>alert('Schedule Updated Successfully');window.location.href='../../../admin/schedules.php';</script>";
			}else{
				echo "<script>alert('Could Not Update Schedules');window.location.href='../../../admin/schedules.php';</script>";

			}
		}
	}

?>