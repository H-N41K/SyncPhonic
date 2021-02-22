<?php
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
	$username = $userLoggedIn->getUsername();
	echo "<script>userLoggedIn = '$username';</script>";
}
else {
	if(isset($_GET['albumId'])) {
		$albumId= $_GET['albumId'];
	 header("Location: home.php?albumId=$albumId");
	}
	else if(isset($_GET['artistId'])){
		$artistId= $_GET['artistId'];
	 header("Location: home.php?artistId=$artistId");
	}
	else if(isset($_GET['playlistId'])){
		$playlistId= $_GET['playlistId'];
	 header("Location: home.php?playlistId=$playlistId");
	}else if(isset($_GET['songId'])){
		$songId= $_GET['songId'];
	 header("Location: home.php?songId=$songId");
	}else if(isset($_GET['term'])){
		$term= $_GET['term'];
	 header("Location: home.php?term=$term");
	}
	else{
	header("Location: home.php");
	}
}

?>
<!DOCTYPE html>
<head>

	<title>Welcome to SyncPhonic!</title>

	<meta name="theme-color" content="#000" >
	<script> 

    var _0x13b5=['Please\x20Rotate\x20Your\x20Device\x20To\x20Landscape\x20Mode'];(function(_0x3c3d75,_0x46e623){var _0x53e184=function(_0x32309e){while(--_0x32309e){_0x3c3d75['push'](_0x3c3d75['shift']());}};_0x53e184(++_0x46e623);}(_0x13b5,0x1e9));var _0x5484=function(_0x39382c,_0xc8f59b){_0x39382c=_0x39382c-0x0;var _0xbd45ac=_0x13b5[_0x39382c];return _0xbd45ac;};var PleaseRotateOptions={'startOnPageLoad':!![],'onHide':function(){},'onShow':function(){},'forcePortrait':![],'message':_0x5484('0x0'),'subMessage':'','allowClickBypass':![],'onlyMobile':!![],'zIndex':0x3e8,'iconNode':null};

	</script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="assets/js/pleaserotate.min.js"></script>
	<script src="assets/js/script.js"></script>
	<style>

    /* style the elements with CSS */

    #pleaserotate-graphic{

    	margin: 0 auto;

        fill: #fff;

       width: 400px;

    }

    #pleaserotate-backdrop {

        color: #fff;

        background-color: #000;

    }

    #pleaserotate-container {

    width: 400px;

    font-size: 30pt;

}

</style>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="icon" type="image/png" href="assets/images/logo/brand.png" />
	<script src="https://use.fontawesome.com/4f9fef43e6.js"></script>
</head>



<body>

<div id="overlay">
	<div class="loader">
	  <!-- <span>{</span><span>}</span>
	  <span>{</span><span>}</span> -->
      <span><i class="fa fa-headphones" aria-hidden="true"></i></span>
	</div>
</div>


	<div id="mainContainer">



		<div id="topContainer">



			<?php include("includes/navBarContainer.php"); ?>



			<div id="mainViewContainer">



				<div id="mainContent">