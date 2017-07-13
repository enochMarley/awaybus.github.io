var optDiv = $(".panel-option-div").width();
$(".panel-option-div").css({
  "width": (optDiv + 25),
  "height": optDiv
});

function getBuses() {
  $.ajax({
    method: 'GET',
    url: '../includes/server_scripts/admin/getBuses.php',
    success: function(response) {
      $(".buses-div").html(response);
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function removeBus(id, name) {
  var confirmDelete = confirm("Are You Sure You Want To Delete " + name + " From The Buses List?");
  if (confirmDelete) {
    $.ajax({
      method: 'POST',
      url: '../includes/server_scripts/admin/removeBus.php?id=' + id,
      success: function(response) {
        alert(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }
}

function editBus(id) {
  window.location.href = "editBus.php?id=" + id;
}

setInterval(function() {
  getBuses();
}, 1000);

function getDestinations() {
  $.ajax({
    method: 'GET',
    url: '../includes/server_scripts/admin/getDestinations.php',
    success: function(response) {
      $(".destinations-div").html(response);
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function removeDestination(id, name) {
  var confirmDelete = confirm("Are You Sure You Want To Delete " + name + " From The Destinations List?");
  if (confirmDelete) {
    $.ajax({
      method: 'POST',
      url: '../includes/server_scripts/admin/removeDestination.php?id=' + id,
      success: function(response) {
        alert(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }
}

setInterval(function() {
  getDestinations();
}, 1000);

$(".start-destination,.end-destination").on("change", function() {
  var startDestination = $(".start-destination").val();
  var endDestination = $(".end-destination").val();

  if (startDestination == endDestination) {
    alert("Start And End Destintions Cannot Be The Same.");
    $(".start-destination,.end-destination").prop('selectedIndex', 0);
  }
});

function getRoutes() {
  $.ajax({
    method: 'GET',
    url: '../includes/server_scripts/admin/getRoutes.php',
    success: function(response) {
      $(".routes-div").html(response);
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function removeRoute(id) {
  var confirmDelete = confirm("Are You Sure You Want To Delete This Route?");
  if (confirmDelete) {
    $.ajax({
      method: 'POST',
      url: '../includes/server_scripts/admin/removeRoute.php?id=' + id,
      success: function(response) {
        alert(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }
}

setInterval(function() {
  getRoutes();
}, 1000);
$(".dep-date, .arr-date").datepicker({
  startDate: "0m",
  todayHighlight: true,
  format: "yyyy-mm-dd"
});

function getSchedules() {
  $.ajax({
    method: 'GET',
    url: '../includes/server_scripts/admin/getSchedules.php',
    success: function(response) {
      $(".shedules-div").html(response);
    },
    error: function(error) {
      console.log(error);
    }
  });
}

function removeSchedule(id, name) {
  var confirmDelete = confirm("Are You Sure You Want To Delete This Schedule?");
  if (confirmDelete) {
    $.ajax({
      method: 'POST',
      url: '../includes/server_scripts/admin/removeSchedule.php?id=' + id,
      success: function(response) {
        alert(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }
}

function editSchedule(id) {
  window.location.href = "editSchedule.php?id=" + id;
}

setInterval(function() {
  getSchedules();
}, 1000);
