<?php  
	include "../dbConfig.php";
	$destination = trim($_POST["destination"]);

	$searchQuery = "SELECT destinationName FROM destinations WHERE destinationName = '$destination';";
	$searchResult = $database->query($searchQuery);
	if (mysqli_num_rows($searchResult) >0) {
		echo "<script>alert('The Destination $destination Already Exists');window.location.href='../../../admin/destinations.php';</script>";
	}else{
		$insertQuery = "INSERT INTO destinations(destinationName) VALUES('$destination');";
		$insertResult = $database->query($insertQuery);
		if ($insertResult) {
			echo "<script>alert('$destination Added Successfully');window.location.href='../../../admin/destinations.php';</script>";
		}else{
			echo "<script>alert('Sorry, $destination Could Not Be Added');window.location.href='../../../admin/destinations.php';</script>";
		}
	}
?>