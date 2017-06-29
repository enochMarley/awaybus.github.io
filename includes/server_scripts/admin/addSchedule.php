<?php  
	include "../dbConfig.php";

	$busType = $_POST["busType"];
	$route = $_POST["route"];
	$departureDate = $_POST["departureDate"];
	$departureTime = $_POST["departureTime"];
	$arrivalDate = $_POST["arrivalDate"];
	$arrivalTime = $_POST["arrivalTime"];
	$pricePerAdult = $_POST["pricePerAdult"];
	$pricePerChild = $_POST["pricePerChild"];
	$numberOfSeats = 0;

	if (isset($busType) && isset($route) && isset($departureDate) && isset($departureTime) && isset($arrivalDate) && isset($arrivalTime) && isset($pricePerAdult) && isset($pricePerChild)) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$numOfSeatsQuery = "SELECT busNumberOfSeats from buses WHERE busNumber = '$busType';";
			$numOfSeatsResult = $database->query($numOfSeatsQuery);
			if (mysqli_num_rows($numOfSeatsResult) > 0) {
				$row = $numOfSeatsResult->fetch_assoc();
				$numberOfSeats = $row["busNumberOfSeats"];
			}
			
			$checkQuery = "SELECT * FROM schedules WHERE busType = '$busType' AND route = '$route' AND depDate = '$departureDate' AND depTime = '$departureTime' AND arrDate = '$arrivalDate' AND arrTime = '$arrivalTime' AND pricePerAdult = $pricePerAdult AND pricePerChild = $pricePerChild AND numberOfSeats = $numberOfSeats;";

			$checkResult = $database->query($checkQuery);
			if (mysqli_num_rows($checkResult) > 0) {
				echo "<script>alert('This Schedule Already Exists');window.location.href='../../../admin/schedules.php';</script>";
			}else{
				$insertQuery = "INSERT INTO schedules(busType,route,depDate,depTime,arrDate,arrTime,pricePerAdult,pricePerChild,numberOfSeats) VALUES('$busType','$route','$departureDate','$departureTime','$arrivalDate','$arrivalTime',$pricePerAdult,$pricePerChild,$numberOfSeats);";

				$insertResult = $database->query($insertQuery);
				if ($insertResult) {
					echo "<script>alert('Schedule Added Successfully');window.location.href='../../../admin/schedules.php';</script>";
				}else{
					echo "<script>alert('Could Not Add Schedule');window.location.href='../../../admin/schedules.php';</script>";
				}
			}
		}
	}

?>