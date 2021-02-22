<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $username;
		$_SESSION['userType'] = $account->getUserType($username);
		$dateA = $account->getPremiumValidity($username);
		$dateB = date("Y-m-d h:i:s");
		$numDays = (strtotime($dateA) - strtotime($dateB))/60/60/24;
		if(strtotime($dateA) > strtotime($dateB)){ 
    	//Premium hasnt expired
		$_SESSION['premiumValidity'] = true;
		$_SESSION['premiumDaysLeft'] = $numDays;	
		}else{
		$_SESSION['premiumValidity'] = false;
		$_SESSION['premiumDaysLeft'] = 0;
		}
		if(isset($_GET['albumId'])) {
	$albumId= $_GET['albumId'];
	 header("Location: album.php?albumId=$albumId");
	}
	else if(isset($_GET['artistId'])){
		$artistId= $_GET['artistId'];
	 header("Location: artist.php?artistId=$artistId");
	}
	else if(isset($_GET['playlistId'])){
		$playlistId= $_GET['playlistId'];
	 header("Location: playlist.php?playlistId=$playlistId");
	}
	else if(isset($_GET['songId'])){
		$songId= $_GET['songId'];
	 header("Location: song.php?songId=$songId");
	}else if(isset($_GET['term'])){
		$term= $_GET['term'];
	 header("Location: search.php?term=$term");
	}
	else{
	header("Location: index.php");
	}
	}

}
?>