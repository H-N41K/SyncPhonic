<?php 
include("includes/includedFiles.php");
if($_SESSION['premiumValidity'] == true) {
	echo "<div id='getPremium-modal'>
				<h2>🌠 SyncPhonic Premium</h2>
     			<h3>Subscription Status :You have ".floor($_SESSION['premiumDaysLeft'])." days remaining.</h3>
     			<span>Incase you want to renew your subscription ,contact at +91-1234567890.</span>
     		</div";
}
else {
	echo "<div id='getPremium-modal'>
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
}

?>


