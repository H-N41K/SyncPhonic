<?php include("includes/includedFiles.php"); 

if(isset($_GET['playlistId'])) {
	$playlistId = $_GET['playlistId'];
}
else {
	header("Location: index.php");
}

$playlist = new Playlist($con, $playlistId);
$owner = new User($con, $playlist->getOwner());
?>

<div class="entityInfo">

	<div class="leftSection">
		<div class="playlistImage">
			<img src="assets/images/icons/playlist.png">
		</div>
	</div>

	<div class="rightSection">
		<h2><?php echo $playlist->getName(); ?></h2>
		<p>By <?php echo $playlist->getOwner(); ?></p>
		<p><?php echo $playlist->getNumberOfSongs(); ?> songs</p>
		<button class="button" onclick="deletePlaylist('<?php echo $playlistId; ?>')">DELETE PLAYLIST</button>
		<br>
		Share this playlist:
	<a href="whatsapp://send?text=*Check Out This playlist on SyncPhonic created by <?php echo $owner->getUsername();?>* &nbsp;<?php echo $ROOT_URL?>playlist.php?playlistId=<?php echo $playlistId?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>
	<a href="https://twitter.com/intent/tweet?text=Check Out This playlist on SyncPhonic created by <?php echo $owner->getUsername();?>&url=<?php echo $ROOT_URL?>playlist.php?playlistId=<?php echo $playlistId;?>" ><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>

	<a href="https://www.facebook.com/sharer.php?t=Check Out This playlist on SyncPhonic created by <?php echo $owner->getUsername();?>&u=<?php echo $ROOT_URL?>playlist.php?playlistId=<?php echo $playlistId;?>" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $playlist->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$playlistSong = new Song($con, $songId);
			$songArtist = $playlistSong->getArtist();
			$songArtist_2 = $playlistSong->getArtist_2();
			$songArtist_3 = $playlistSong->getArtist_3();
			$songArtist_4 = $playlistSong->getArtist_4();

			echo "<li class='tracklistRow'>
							<div class='trackCount'>
								<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"".$playlistSong->getId()."\", tempPlaylist, true);'>
								<span class='trackNumber'>$i</span>
							</div>
							<div class='trackInfo'>
								<span class='trackName'>".$playlistSong->getTitle()."</span>
								<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$songArtist->getId()."\")'>".$songArtist->getName()."</span>	";
			if($songArtist_2->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$songArtist_2->getId()."\")'>, ".$songArtist_2->getName()."</span>"; }
			if($songArtist_3->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$songArtist_3->getId()."\")'>, ".$songArtist_3->getName()."</span>"; }
			if($songArtist_4->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$songArtist_4->getId()."\")'>, ".$songArtist_4->getName()."</span>"; }
							 
				echo "		</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $playlistSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $playlistSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
			?>
			<nav class="shareMenu" data-share-id='<?php echo $playlistSong->getId();?>'>
	Share:
	<a href="whatsapp://send?text=*Check Out This Song on SyncPhonic: <?php echo $playlistSong->getTitle()." by ".$songArtist->getName(); ?>* &nbsp;<?php echo $ROOT_URL?>song.php?songId=<?php echo $playlistSong->getId();?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>

	<a href="https://twitter.com/intent/tweet?text=Check Out This Song on SyncPhonic: <?php echo $playlistSong->getTitle()." by ".$songArtist->getName(); ?>&url=<?php echo $ROOT_URL?>song.php?songId=<?php echo $playlistSong->getId();?>" ><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>

	<a href="https://www.facebook.com/sharer.php?t=Check Out This Song on SyncPhonic : <?php echo $playlistSong->getTitle()." by ".$songArtist->getName(); ?>&u=<?php echo $ROOT_URL?>/song.php?songId=<?php echo $playlistSong->getId();?>" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
	</nav>
			<?php } ?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>

	</ul>
</div>

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
	<div class="item" onclick="removeFromPlaylist(this, '<?php echo $playlistId; ?>')">Remove from Playlist</div>
</nav>
