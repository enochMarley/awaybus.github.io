<?php  
	include "../dbConfig.php";
	$id = intval($_GET["id"]);

	$deleteQuery = "DELETE FROM routes WHERE routeId = $id;";
	$deleteQueryResult = $database->query($deleteQuery);
	if ($deleteQueryResult) {
		echo "Route Deleted Successfully";
	}else{
		echo "Route Could Not Be Deleted";
	}
	
?>