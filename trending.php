<?php 
include("includes/includedFiles.php");

?>
<div class="tracklistContainer borderBottom">
	<h1 class="pageHeadingBig">📈 TRENDING MUSIC</h1>
	<ul class="tracklist">
		<?php 
			$trendingQuery = mysqli_query($con, "SELECT * FROM songs WHERE plays > 0 ORDER BY plays DESC LIMIT 15");

		while($row = mysqli_fetch_array($trendingQuery)) {
			$songIdArray[] = $row['id'];
		}
		if(mysqli_num_rows($trendingQuery) > 0)
		{
			$i = 1;
			foreach ($songIdArray as $songId) {
				
				$albumSong = new Song($con, $songId);
				$albumArtist = $albumSong->getArtist();
				$albumArtist_2 = $albumSong->getArtist_2();
				$albumArtist_3 = $albumSong->getArtist_3();
				$albumArtist_4 = $albumSong->getArtist_4();
				echo "<li class='tracklistRow'>
							<div class='trackCount'>
								<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"".$albumSong->getId()."\", tempPlaylist, true);'>
								<span class='trackNumber'>#$i</span>
							</div>
							<div class='trackInfo'>
								<span class='trackName'>".$albumSong->getTitle()."</span>
								<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist->getId()."\")'>".$albumArtist->getName()."</span>	";
			if($albumArtist_2->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_2->getId()."\")'>, ".$albumArtist_2->getName()."</span>"; }
			if($albumArtist_3->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_3->getId()."\")'>, ".$albumArtist_3->getName()."</span>"; }
			if($albumArtist_4->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_4->getId()."\")'>, ".$albumArtist_4->getName()."</span>"; }
							 
				echo "		</div>

						<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
						</div>
						<div class='trackDuration'>
							<span class='duration'>".$albumSong->getDuration()."</span>
						</div>
				      </li>";
				$i++;
				?>
	<nav class="shareMenu" data-share-id='<?php echo $albumSong->getId();?>'>
	Share:
	<a href="whatsapp://send?text=*Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>* &nbsp;<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>

	<a href="https://twitter.com/intent/tweet?text=Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&url=<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>

	<a href="https://www.facebook.com/sharer.php?t=Check Out This Song on SyncPhonic : <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&u=<?php echo $ROOT_URL?>/song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
	</nav>
				<?php
			}
		}else{
			echo "<span class='noResults'>There's no music that's currently trending!! 😕</span>";
		}
		?>
		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray);?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>
	</ul>	
</div>
<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
	

</nav>