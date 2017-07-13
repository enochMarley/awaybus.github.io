<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        echo "<script>window.location.href = 'index.php'</script>";
    }
?>
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
        <br><br><br><br>
        <div class='container-fluid '>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h3 class="text-center">Payment Summary</h3>
                    <div>
                        <form action="https://community.ipaygh.com/gateway" id="ipay_checkout" method="post" name="ipay_checkout" target="_blank" class="user-form">
                            <input name="merchant_key" type="hidden" value="575d2570-6620-11e7-8845-f23c9170642f">
                            <input id="merchant_code" name="merchant_code" type="hidden" value="TST000000000417">
                            <input id="invoice_id" name="invoice_id" type="hidden" value="">
                            <label>Name</label><br>
                            <input title="Name" name="extra_name" type="text" value="<?php echo $_SESSION['fullName'] ?>" readonly><br><br>
                            <label>Contact Number</label><br>
                            <input title="Mobile number" name="extra_mobile" type="text" value="<?php echo $_SESSION['phoneNumber'] ?>" readonly><br><br>
                            <label>Email Address</label><br>
                            <input title="Email" name="extra_email" type="text" value="<?php echo $_SESSION['emailAddress'] ?>"><br><br>
                            <label>Description Of Payment</label><br>
                            <input title="Description" name="description" type="text" value=""><br><br>
                            <label>Payemt Amount</label><br>
                            <input title="Total" name="total" size="10" type="text" value="<?php echo $_SESSION['totalPrice']?>" readonly><br><br>
                            <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-money"></i> Ok Proceed</button><br><br>
                            <img src="https://payments.ipaygh.com/app/webroot/img/iPay_payments.png" alt="iPay">
                            <!-- <table border="0" cellpadding="0px" cellspacing="0px">
                            <tr><td>Name</td><td>Contact Number</td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td> </td></tr>
                            <tr><td>Email Address</td></tr><tr><td></td></tr>
                            <tr><td> </td></tr>
                            <tr><td>Description of Payment</td><td>Payment Amount (GH¢)</td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td> </td></tr>
                            <tr><td></td><td></td></tr>
                            </table> -->
                        </form>
                        <script type="text/javascript">
                        (function(){
                        Date.prototype.today = function () { return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();};
                        Date.prototype.timeNow = function () { return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();};
                        document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();
                        })();
                        </script>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
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
