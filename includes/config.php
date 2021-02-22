<?php
		$ROOT_URL ='http://localhost/SyncPhonic/';
		ob_start();//send data to server into pieces
		session_start();//inorder to use session to hold ligin
		$timeZone = date_default_timezone_set("Asia/Kolkata");

$con = mysqli_connect("localhost", "root", "", "syncphonic");


		if(mysqli_connect_errno()) // to check connection
		{
			echo "Failed to connect:" . mysqli_connect_errno(); 
		}
?>