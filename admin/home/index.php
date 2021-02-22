<?php 
include("../../includes/config.php");
if(isset($_SESSION['userLoggedIn']) && isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: ../../index.php");
}?>
<html>
	<head>
		<title>SyncPhonic | Admin</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
		<?php include '../navBar.php';?>
		</div>
	</body>
</html>

