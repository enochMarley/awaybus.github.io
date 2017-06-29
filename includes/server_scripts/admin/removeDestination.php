<?php  
	include "../dbConfig.php";
	$id = intval($_GET["id"]);

	$deleteQuery = "DELETE FROM destinations WHERE destinationId = $id;";
	$deleteQueryResult = $database->query($deleteQuery);
	if ($deleteQueryResult) {
		echo "Destination Deleted Successfully";
	}else{
		echo "Destination Could Not Be Deleted";
	}
	
?>