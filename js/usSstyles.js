var navHeight = $(".navbar").height();
$(".parallax-window").parallax();
$(".date-input").datepicker({
	startDate:"0m",
	todayHighlight:true,
	format:"yyyy-mm-dd"
});
$(".user-Ddate").datepicker({
	format:"yyyy-mm-dd",
});
var introTexts = ["Bus Reservation Has Never Got Faster And Easier",
"Reserve Your Bus Ticket At Your Own Comfort","Book Single Or Return Trips","All Transactions Are Secured"];

$(".dep-select,.dest-select").on("change", function(){
	var startDestination  = $(".dep-select").val();
	var endDestination  = $(".dest-select").val();

	if(startDestination == endDestination){
	    alert("Departure And Destination Locations Cannot Be The Same.");
		$(".dep-select,.dest-select").prop('selectedIndex',0);
	}
});

$(".one-trip-form").on("submit", function(event){
	event.preventDefault();
	var departureLocation = $(".dep-select").val();
	var destinationLocation = $(".dest-select").val();
	var departureDate = $(".date-input").val();
	var numberOfAdults = $(".number-of-adults").val();
	var numberOfChildren = $(".number-of-children").val();
	var tripDetailsObj = {};

	if (numberOfChildren == 0 && numberOfAdults == 0) {
		alert("Either Number Of Children Or Number Of Adults Must Be At Least 1");
	}else{
		tripDetailsObj.departureLocation = departureLocation;
		tripDetailsObj.destinationLocation = destinationLocation;
		tripDetailsObj.departureDate = departureDate;
		tripDetailsObj.numberOfAdults = numberOfAdults;
		tripDetailsObj.numberOfChildren = numberOfChildren;
		var data = $.param(tripDetailsObj);
		$.ajax({
			method: 'POST',
			data: data,
			url: "includes/server_scripts/users/processOneTripRequest.php",
			success: function(response){
				$(".trip-res-div").html(response);
				window.location.href = "#trip-result-div";
			},
			error: function(error){
				alert(error.toString());
			}
		});
	}
});

$(".return-trip-form").on("submit", function(event){
	event.preventDefault();
	var departureLocation = $(".ret-dep-select").val();
	var destinationLocation = $(".ret-dest-select").val();
	var departureDate = $(".dep-date").val();
	var depNumberOfAdults = $(".dep-num-of-adults").val();
	var depNumberOfChildren = $(".dep-num-of-children").val();
	var returnDate = $(".ret-date").val();
	var retNumberOfAdults = $(".ret-num-of-adults").val();
	var retNumberOfChildren = $(".ret-num-of-children").val();

	var tripDetailsObj = {};

	if ((depNumberOfAdults == 0 && depNumberOfChildren == 0) || (retNumberOfAdults == 0 && retNumberOfChildren == 0)) {
		alert("Either Number Of Children Or Number Of Adults Must Be At Least 1");
	}else{
		tripDetailsObj.departureLocation = departureLocation;
		tripDetailsObj.destinationLocation = destinationLocation;
		tripDetailsObj.departureDate = departureDate;
		tripDetailsObj.depNumberOfAdults = depNumberOfAdults;
		tripDetailsObj.depNumberOfChildren = depNumberOfChildren;
		tripDetailsObj.returnDate = returnDate;
		tripDetailsObj.retNumberOfAdults = retNumberOfAdults;
		tripDetailsObj.retNumberOfChildren = retNumberOfChildren;
		var data = $.param(tripDetailsObj);
		$.ajax({
			method: 'POST',
			data: data,
			url: "includes/server_scripts/users/processReturnTripRequest.php",
			success: function(response){
				$(".trip-res-div").html(response);
				window.location.href = "#trip-result-div";
			},
			error: function(error){
				alert(error.toString());
			}
		});
	}
});

function bookBus(id, numOfdults,numOfChildren){
	window.location.href = "bookBus.php?id="+id+"&numOfAdults="+numOfdults+"&numOfChildren="+numOfChildren;
}

function bookReturnBus(id,depNumOfAdults,depNumOfChildren,retNumOfAdults,retNumOfChildren){
	window.location.href = "bookReturnBus.php?id="+id+"&depNumOfAdults="+depNumOfAdults+"&depNumOfChildren="+depNumOfChildren+
	"&retNumOfChildren="+retNumOfChildren+"&retNumOfAdults="+retNumOfAdults;
}

function getRandomSchedules(){
	$.ajax({
		method: 'GET',
		url: "includes/server_scripts/users/getRandomSchedules.php",
		success: function(response){
			$(".rand-trip-div").html(response);
		},
		error: function(error){
			alert(error.toString());
		}
	});
}

//getRandomSchedules();

function changeIntroTexts(){
	var i = 0;
	$(".intro-text").css("opacity",0)
	$(".intro-text").html(introTexts[i]).animate({"opacity":1},1000);
	setInterval(function(){

		$(".intro-text").animate({"opacity":0},1000);

		setTimeout(function(){
			i += 1;
			$(".intro-text").html(introTexts[i]);
			$(".intro-text").animate({"opacity":1},1000);
		},1000);

		if (i == (introTexts.length - 1)) {
			i = -1;
		}
	},7000);
}

changeIntroTexts();

new WOW().init();
$(".navbar a").addClass("home-navbar-init-text");

$(window).on("scroll", function(){
	if ($(this).scrollTop() >= navHeight) {
		$(".home-nav-bar").removeClass("nav-trans");
		$(".navbar a").css({"color":"#FFA500"});
	}else{
		$(".home-nav-bar").addClass("nav-trans");
		$(".navbar a").css({"color":"#FFA500"});
	}
});

function openNav() {
    $(".sidenav").css({"width":"100%","z-index":"1999"});
    $(".menuBtn").animate({opacity: '0',},"slow");
    $("body").css("background-color","rgba(1,1,1,0.6)");
}

function closeNav() {
    $(".sidenav").css("width","0px");
    $(".menuBtn").animate({opacity: '1',},"slow");
    $("body").css("background-color","#fff");
}
/*$(function() {
			  $('a[href*="#"]:not([href="#"])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html, body').animate({
			          scrollTop: target.offset().top
			        }, 1500);
			        return false;
			      }
			    }
			  });
			});*/
