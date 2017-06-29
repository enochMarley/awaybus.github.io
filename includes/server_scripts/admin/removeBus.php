<?php  
	include "../dbConfig.php";
	$id = intval($_GET["id"]);

	$deleteQuery = "DELETE FROM buses WHERE busId = $id;";
	$deleteQueryResult = $database->query($deleteQuery);
	if ($deleteQueryResult) {
		echo "Bus Deleted Successfully";
	}else{
		echo "Bus Could Not Be Deleted";
	}
?>