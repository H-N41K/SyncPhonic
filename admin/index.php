<?php 
include("../includes/config.php");
if(isset($_SESSION['userLoggedIn']) && isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: ../index.php");
}
?>