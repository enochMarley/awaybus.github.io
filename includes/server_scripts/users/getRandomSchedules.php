<?php
    include "../dbConfig.php";
    $date = date('Y-m-d');
    $getQuery = "SELECT * FROM schedules WHERE depDate >= '$date';";
    $getResult = $database->query($getQuery);
    if (mysqli_num_rows($getResult) > 0) {
        while ($row = $getResult->fetch_assoc()) {
            $scheduleId = $row["scheduleId"];
			$busType = $row["busType"];
			$travelRoute = $row["route"];
			$departureDate = $row["depDate"];
			$departureTime = $row["depTime"];
            $returnDate = $row["arrDate"];
            $returnTime = $row["arrTime"];
			$pricePerAdult = $row["pricePerAdult"];
			$pricePerChild = $row["pricePerChild"];
			$numberOfSeats = $row["numberOfSeats"]; ?>

            <div class="col-md-3">
                <div class="card-div">
                    <div class=" alert alert-info">
                        <p class="text-left"><strong>Route:</strong><br><?php echo $travelRoute; ?> &amp; back</p>
                        <p class="text-left"><strong>Departure Date:</strong><br><?php echo $departureDate; ?></p>
                        <p class="text-left"><strong>Departure Time:</strong><br><?php echo $departureTime; ?></p>
                        <p class="text-left"><strong>Return Date:</strong><br><?php echo $returnDate; ?></p>
                        <p class="text-left"><strong>Return Time:</strong><br><?php echo $returnTime; ?></p>
                        <p class="text-left"><strong><?php echo $numberOfSeats; ?> </strong> Seats Available</p>
                    </div>
                    <button onclick="bookReturnBus(<?php echo $scheduleId; ?>,<?php echo $depNumberOfAdults;?>,<?php echo $depNumberOfChildren;?>,
                        <?php echo $retNumberOfAdults;?>,<?php echo $retNumberOfChildren;?>)" class="btn btn-info book-btn"><i class="fa fa-shopping-cart"></i> Book Now</button>
                </div>
            </div>
<?php
        }
    }else{
        echo "";
    }
 ?>
