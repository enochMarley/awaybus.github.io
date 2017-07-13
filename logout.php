<?php  
	session_start();
	unset($_SESSION["username"]);
	echo "<script>window.location.href  = '".$_SESSION['prev_page']."'</script>";
?>