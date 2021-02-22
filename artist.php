<?php
include ("includes/includedFiles.php");

if(isset($_GET['artistId'])) {
	$artistId = $_GET['artistId'];
}
else {
	header("Location: index.php");
}
$artist = new Artist($con, $artistId);

?>

<div class="entityInfo borderBottom">
	<div class="leftSection">
		<img src="<?php echo $artist->getImageUrl();?>" alt="">
	</div>

	<div class="rightSection">
		<h2><?php echo $artist->getName();?></h2>
		<p><?php echo $artist->getDescription(); ?></p>
		Share this artist's profile:
	<a href="whatsapp://send?text=*Check Out This Artist on SyncPhonic: <?php echo $artist->getName(); ?>* &nbsp;<?php echo $ROOT_URL?>artist.php?artistId=<?php echo $artist->getId();?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>

	<a href="https://twitter.com/intent/tweet?text=Check Out This Artist on SyncPhonic: <?php echo $artist->getName(); ?>&url=<?php echo $ROOT_URL?>artist.php?artistId=<?php echo $artist->getId();?>" ><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>

	<a href="https://www.facebook.com/sharer.php?t=Check Out This Artist on SyncPhonic: <?php echo $artist->getName(); ?>&u=<?php echo $ROOT_URL?>/artist.php?artistId=<?php echo $artist->getId();?>" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
	<br><br>
		<div class="headerButtons">
				<button class="button playGreen" onclick="playFirstSong();"><img class='play' src='assets/images/icons/play-white.png' width="10" height="10" >&nbsp;PLAY</button>
			</div>
	</div>
</div>

<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		<?php 
			$songIdArray = $artist->getSongIds();
			$i = 1;
			foreach ($songIdArray as $songId) {
				if($i > 15){
					break;
				}
				$albumSong = new Song($con, $songId);
				$albumArtist = $albumSong->getArtist();
				$albumArtist_2 = $albumSong->getArtist_2();
				$albumArtist_3 = $albumSong->getArtist_3();
				$albumArtist_4 = $albumSong->getArtist_4();
				echo "<li class='tracklistRow'>
							<div class='trackCount'>
								<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"".$albumSong->getId()."\", tempPlaylist, true);'>
								<span class='trackNumber'>$i</span>
							</div>
							<div class='trackInfo'>
								<span class='trackName'>".$albumSong->getTitle()."</span>
								<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist->getId()."\")'>".$albumArtist->getName()."</span>	";
			if($albumArtist_2->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_2->getId()."\")'>, ".$albumArtist_2->getName()."</span>"; }
			if($albumArtist_3->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_3->getId()."\")'>, ".$albumArtist_3->getName()."</span>"; }
			if($albumArtist_4->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_4->getId()."\")'>, ".$albumArtist_4->getName()."</span>"; }				 
				echo "</div>

						<div class='trackOptions'>
							<input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
						 	<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
						</div>
						<div class='trackDuration'>
							<span class='duration'>".$albumSong->getDuration()."</span>
						</div>
				      </li>";
				$i++; ?>
			<nav class="shareMenu" data-share-id='<?php echo $albumSong->getId();?>'>
	Share:
	<a href="whatsapp://send?text=*Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>* &nbsp;<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>

	<a href="https://twitter.com/intent/tweet?text=Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&url=<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>

	<a href="https://www.facebook.com/sharer.php?t=Check Out This Song on SyncPhonic : <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&u=<?php echo $ROOT_URL?>/song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
	</nav>
			<?php }
		?>
		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray);?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>
	</ul>	
</div>

<div class="gridViewContainer">
	<h2>ALBUMS</h2>
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

		while($row = mysqli_fetch_array($albumQuery)) {
			



			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?albumId=" . $row['id'] . "\");'>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";
		}
	?>

</div>
<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>