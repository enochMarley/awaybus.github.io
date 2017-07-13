<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Away Bus</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery-ui-theme.css">
  <link rel="stylesheet" href="css/user_styles.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/animate.css">
</head>

<body>
  <?php
	include "includes/server_scripts/dbConfig.php";
	session_start();
	$_SESSION['prev_page'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$id = intval($_GET["id"]);
	$numberOfAdults = intval($_GET["numOfAdults"]);
	$numberOfChildren = intval($_GET["numOfChildren"]);

	if (!isset($_SESSION["username"])) { ?>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Home</a>
    <a href="#">Book Ticket</a>
    <a href="#">Services</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
    <a href="login.php">Login</a>
    <a href="signup.php">Signup</a>
  </div>

  <nav class="navbar navbar-inverse navbar-fixed-top wow bounceInDown home-nav-bar" data-wow-duration="1s" data-wow-delay="0.1s">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle menuBtn" onclick="openNav()">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
        <a class="navbar-brand" href="#">AwayBus</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav  navbar-right">
          <li><a href="#">Home</a></li>
          <li><a href="#" class="home-navbar-init-text">Book Ticket</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav> <br><br><br><br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card-div">
            <h3 class="text-center">
				You Are Currently Not Logged In. Please Login Or Sign Up To Continue
			</h3>
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <a href="login.php">
				    <button class="btn btn-primary btn-lg not-sign-btn">
						<i class="fa fa-key"></i> Login
					</button>
				</a>
                <a href="signup.php">
					<button class="btn btn-warning btn-lg not-sign-btn">
						<i class="fa fa-user-plus"></i> Sign Up
					</button>
				</a>
            </div>
            <div class="col-md-1"></div>
          </div><br>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <?php
	}else{
		$getQuery = "SELECT * FROM schedules WHERE scheduleId = $id";
		$getResult  = $database->query($getQuery);
		if (mysqli_num_rows($getResult) > 0) {
            //get the schedule details
			$row = $getResult->fetch_assoc();
			$travelRoute = $row["route"];
			$departureDate = $row["depDate"];
			$departureTime = $row["depTime"];
			$pricePerAdult = $row["pricePerAdult"];
			$pricePerChild = $row["pricePerChild"];
			$adultsPrice = $pricePerAdult * $numberOfAdults;
			$childrenPrice = $pricePerChild * $numberOfChildren;
			$totalPrice = $adultsPrice + $childrenPrice;

            //if the schedule details are got, get the user's details as wddx_serialize_value
            $username = $_SESSION["username"];
            $userQuery = "SELECT * FROM users WHERE username = '$username';";
            $userResult = $database->query($userQuery);
            $row = $userResult->fetch_assoc();
            $fullName = $row["fullName"];
            $phoneNumber = $row["phoneNumber"];
            $emailAddress = $row["emailAddress"];

            $_SESSION["fullName"] = $fullName;
            $_SESSION["emailAddress"] = $emailAddress;
            $_SESSION["phoneNumber"] = $phoneNumber;
            $_SESSION["totalPrice"] = $totalPrice;
		}else{
			echo "<script>window.location.href = 'index.php'</script>";
		}

		?>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#" class="selected">Home</a>
      <a href="#">Book Ticket</a>
      <a href="#">Services</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
      <a href="logout.php">Logout</a>
    </div>

    <nav class="navbar navbar-inverse navbar-fixed-top wow bounceInDown home-nav-bar" data-wow-duration="1s" data-wow-delay="0.1s">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle menuBtn" onclick="openNav()">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
          <a class="navbar-brand" href="#">AwayBus</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav  navbar-right">
            <li class="selected"><a href="#">Home</a></li>
            <li><a href="#" class="home-navbar-init-text">Book Ticket</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br><br><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="card-div">
            <strong>Bus From <?php echo $travelRoute ?></strong>
            <hr>
            <p><strong>Departure Date</strong>:
              <?php echo $departureDate; ?>
            </p>
            <p><strong>Departure Time</strong>:
              <?php echo $departureTime; ?>
            </p>
            <p><strong>Price (Adults)</strong>: GH&cent;
              <?php echo $adultsPrice; ?>
            </p>
            <p><strong>Price (Children)</strong>: GH&cent;
              <?php echo $childrenPrice; ?>
            </p>
            <p><strong>Total Amount</strong>: GH&cent;
              <?php echo $totalPrice; ?>
            </p>
            <hr>
            <a href="payment.php"><button class="btn btn-info"><i class="fa fa-money"></i> Proceed To Payment</button></a>
            <button class="btn btn-warning"><i class="fa fa-remove"></i> Cancel</button>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>

    <?php
	}
?>
    <script src="js/jquery2.2.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/usSstyles.js"></script>
</body>

</html>
