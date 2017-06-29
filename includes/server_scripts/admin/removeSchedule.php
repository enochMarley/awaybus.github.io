<?php  
	include "../dbConfig.php";
	$id = intval($_GET["id"]);

	$deleteQuery = "DELETE FROM schedules WHERE scheduleId = $id;";
	$deleteQueryResult = $database->query($deleteQuery);
	if ($deleteQueryResult) {
		echo "Schedule Deleted Successfully";
	}else{
		echo "Schedule Could Not Be Deleted";
	}
	
?>