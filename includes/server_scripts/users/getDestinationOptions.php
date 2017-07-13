<?php  
	include "includes/server_scripts/dbConfig.php";

	$query = "SELECT * FROM destinations ORDER BY destinationName;";
	$result = $database->query($query);
	if (mysqli_num_rows($result) > 0) {
		echo "<option disabled selected>Select Location</option>";
		while ($row = $result->fetch_assoc()) {
			$location = $row["destinationName"];
			echo "<option value='$location'>$location</option>";
		}
	}else{
		echo "<option disabled selected>No Location Available</option>";
	}

?>