<?php 
include("../../classes/DomDocumentParser.php");
include("../../config.php");
if(($_SESSION['premiumValidity']) == false) {
	$lyrics = "<div id='getPremium-modal'>
     			<h2>🌠 SyncPhonic Premium</h2>
				<h3>Get great music, right now.</h3>
				<h3>Get SyncPhonic Premium Now!</h3>
				<ul>
					<li>Listen & Download loads of songs for free.</li>
					<li>Get lyrics of your favourite songs to sing along!!</li>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
					<li>NEW theme based visuals!! Coz music feels great with visuals. </li>
					<li>Premium plans starting from ₹999 only.. Hurry..</li>
				</ul>
				<span>Contact at +91-1234567890 to avail premium.</span>
				</div>";
			echo $lyrics;
			die();
}
$lyrics = 'Sorry no lyrics found! 😕';
$lyricsNotFound = true;
$id = $_POST['id'];
$visualsButtons = "<h3>🎆😎🎉🔊THEME BASED VISUALS:</h3>
<form method='POST' action='GlissantJoyeux/index.php' style='margin-bottom: 0px;    display: -webkit-inline-box;' target='_blank'>
<button class='lyrics-btn' style='background-color: #5426e0;' name='id' value='".$id."' onclick='pauseSong();'>Glissant Joyeux</button>
</form>
<form method='POST' action='WormholeOfNebula/index.php' style='margin-bottom: 0px;    display: -webkit-inline-box;' target='_blank'>
<button class='lyrics-btn' style='background-color: #126f0c;' name='id' value='".$id."' onclick='pauseSong();'>Wormhole Of Nebula</button>
</form>
<form method='POST' action='VortexOfIlluminati/index.php' style='margin-bottom: 0px;    display: -webkit-inline-box;' target='_blank'>
<button class='lyrics-btn' style='background-color: #a51292;' name='id' value='".$id."' onclick='pauseSong();'>Vortex Of Illuminati</button>
</form>
";
$query = mysqli_query($con, "SELECT * FROM songs WHERE id='$id'");
$resultArray = mysqli_fetch_array($query);

$title = $resultArray["title"];
$title2 = preg_replace('/\s+/', '', $title);
$title2 = strtolower($title2);

$artist = $resultArray["artist"];
$queryToFindArtistName = mysqli_query($con, "SELECT name FROM artists WHERE id='$artist'");
$resultArtistName = mysqli_fetch_array($queryToFindArtistName);

$artistName = $resultArtistName["name"];
$artistName2 = preg_replace('/\s+/', '', $artistName);
$artistName2 = strtolower($artistName2);

$parser = new DomDocumentParser("https://www.azlyrics.com/lyrics/".$artistName2."/".$title2.".html");
$divArray = $parser->getLyrics();
if ($divArray->item(20) != null){
	$lyrics = $divArray->item(20)->nodeValue;
	$lyricsNotFound = false;
}
echo $visualsButtons;
if($lyricsNotFound == true){
	echo '<br><h3>LYRICS: '.$lyrics.'</h3>';
}else{
	
	echo '<h3>🎶🎤LYRICS:<br>'.$title.' By '.$artistName.'</h3><pre>'.$lyrics.'</pre>';
}

?>