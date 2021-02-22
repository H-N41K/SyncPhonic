<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#f43d3d">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>SyncPhonic | 2018</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.css">
    <link rel="shortcut icon" href="assets/images/logo/brand.png">
    <link rel="stylesheet" href="assets/css/land.css">

	<script> 

    var _0x13b5=['Please\x20Rotate\x20Your\x20Device\x20To\x20Landscape\x20Mode'];(function(_0x3c3d75,_0x46e623){var _0x53e184=function(_0x32309e){while(--_0x32309e){_0x3c3d75['push'](_0x3c3d75['shift']());}};_0x53e184(++_0x46e623);}(_0x13b5,0x1e9));var _0x5484=function(_0x39382c,_0xc8f59b){_0x39382c=_0x39382c-0x0;var _0xbd45ac=_0x13b5[_0x39382c];return _0xbd45ac;};var PleaseRotateOptions={'startOnPageLoad':!![],'onHide':function(){},'onShow':function(){},'forcePortrait':![],'message':_0x5484('0x0'),'subMessage':'','allowClickBypass':![],'onlyMobile':!![],'zIndex':0x3e8,'iconNode':null};

	</script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="assets/js/pleaserotate.min.js"></script>
	<style>

    /* style the elements with CSS */

    #pleaserotate-graphic{

    	margin: 0 auto;

        fill: #fff;

       width: 200px;

    }

    #pleaserotate-backdrop {

        color: #fff;

        background-color: #000;

    }

    #pleaserotate-container {

    width: 200px;

    font-size: 20px;

}

</style>
</head>
<body>
<center>
<div id="div" style="width:100%;">
  <div class="container">
      <div style="width:90%;">
      <?php include('assets/svg/svg.php'); ?>
      </div>
  <br>
  <?php
  if(isset($_GET['albumId'])) {
        $albumId= $_GET['albumId'];
     echo "<a class='btn btn-danger' href='register.php?albumId=$albumId'>Checkout the album!!</a>";
    }
    else if(isset($_GET['artistId'])){
        $artistId= $_GET['artistId'];
     echo "<a class='btn btn-danger' href='register.php?artistId=$artistId'>Checkout the artist!!</a>";
    }
    else if(isset($_GET['playlistId'])){
        $playlistId= $_GET['playlistId'];
     echo "<a class='btn btn-danger' href='register.php?playlistId=$playlistId'>Checkout the playlist!!</a>";
    }else if(isset($_GET['songId'])){
        $songId= $_GET['songId'];
     echo "<a class='btn btn-danger' href='register.php?songId=$songId'>Checkout the song!!</a>";
    }else if(isset($_GET['term'])){
        $term= $_GET['term'];
     echo "<a class='btn btn-danger' href='register.php?term=$term'>View search results!!</a>";
    }
    else{
    echo "<a class='btn btn-danger' href='register.php'>Give Me Some Chills!</a>";
    }
  ?>
  </div>
</div>
</center>
    
    
    
    
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script>
    var width = $(window).width();
var height = $(window).height();

$(document).ready(function() {
    anit();
});

$(window).resize(function() {
    $(".div").css({
        width: '400px',
        height: '400px'
    });
    anit();
});

function anit() {
    width = $(window).width();
    height = $(window).height();
    $(".div").width(width).height(height);
}

$(document).ready(function() {
    var path = document.querySelectorAll("path");
    console.log(path.length);
    path[0].classList.add("pulse");
    for (i = 1; i < 11; i++) {
            var string = 'bounce-'+i;
            path[i].classList.add(string);
            path[i].classList.add("fill-box");
    }
});
    </script>
</body>

</html>