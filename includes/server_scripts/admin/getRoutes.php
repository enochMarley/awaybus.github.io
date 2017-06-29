<?php  
	include "../dbConfig.php";

	$fetchQuery = "SELECT * FROM routes ORDER BY routePath;";
	$fetchResult = $database->query($fetchQuery);
	if (mysqli_num_rows($fetchResult) > 0) {
		while ($row = $fetchResult->fetch_assoc()) {
			$routeId = $row["routeId"];
			$routePathRaw = $row["routePath"];
			$routePath = explode("To",$routePathRaw);
			$startRoute = $routePath[0];
			$endRoute = $routePath[1];?>

			
			<div class='col-md-3'>
				<div class='alert alert-info'>
					<?php echo $startRoute; ?>&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
					<?php echo $endRoute; ?>
					<hr>
					<i class='fa fa-trash-o' style='cursor:pointer;font-size: 20px;' onclick="removeRoute(<?php echo $routeId; ?>)"></i>
				</div>
			</div>
<?php
		}
	}else{
		echo "<div class='jumbotron'>
			<h3 class='text-center'>Sorry, No Routes Have Been Added</h3>
		</div>";
	}
?>