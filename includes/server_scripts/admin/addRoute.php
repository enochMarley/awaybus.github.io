<?php  
	include "../dbConfig.php";
	$startDestination = $_POST["startDestination"];
	$endDestination = $_POST["endDestination"];
	$routePath = $startDestination. " To ".$endDestination;

	$searchQuery = "SELECT routePath FROM routes WHERE routePath = '$routePath';";
	$searchResult = $database->query($searchQuery);
	if (mysqli_num_rows($searchResult) > 0) {
		echo "<script>alert('The Route $routePath Already Exists');window.location.href='../../../admin/routes.php';</script>";
	}else{
		$insertQuery = "INSERT INTO routes(routePath) VALUES('$routePath');";
		$insertResult = $database->query($insertQuery);
		if ($insertQuery) {
			echo "<script>alert('The Route $routePath Added Successfully');window.location.href='../../../admin/routes.php';</script>";
		}else{
			echo "<script>alert('Could Not Add Route');window.location.href='../../../admin/routes.php';</script>";
		}
	}

?>