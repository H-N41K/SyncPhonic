<?php
include ("includes/includedFiles.php");

if(isset($_GET['songId'])) {
	$songId = $_GET['songId'];
}
else {
	header("Location: index.php");
}
$albumSong = new Song($con, $songId);
		$songIdArray = array();
		array_push($songIdArray,$songId);
				$albumArtist = $albumSong->getArtist();
				$albumArtist_2 = $albumSong->getArtist_2();
				$albumArtist_3 = $albumSong->getArtist_3();
				$albumArtist_4 = $albumSong->getArtist_4();
				$albumId = $albumSong->getAlbumId();
				$albumObject = new Album($con, $albumId);
?>

	<div class="entityInfo borderBottom">
	<div class="leftSection">
		<img role="link" tabindex="0" src="<?php echo $albumObject->getArtworkPath(); ?>" onclick="openPage('album.php?albumId=<?php echo $albumId;?>')">
	</div>
	<div class="rightSection">
		<h2><?php echo $albumSong->getTitle(); ?></h2>
		<p><?php 
				echo "By <span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist->getId()."\")'>".$albumArtist->getName()."</span>	";
			if($albumArtist_2->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_2->getId()."\")'>, ".$albumArtist_2->getName()."</span>"; }
			if($albumArtist_3->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_3->getId()."\")'>, ".$albumArtist_3->getName()."</span>"; }
			if($albumArtist_4->getName() != 'NULL'){ echo "<span role='link' tabindex='0' class='artistName' onclick='openPage(\"artist.php?artistId=".$albumArtist_4->getId()."\")'>, ".$albumArtist_4->getName()."</span>";}
		?></p>

		Share this song:
	<a href="whatsapp://send?text=*Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>* &nbsp;<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>&nbsp;
	<a href="https://twitter.com/intent/tweet?text=Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&url=<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
	&nbsp;
	<a href="https://www.facebook.com/sharer.php?t=Check Out This Song on SyncPhonic : <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&u=<?php echo $ROOT_URL?>/song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
	<br><br>
		<div class="headerButtons">
				<button class="button playGreen" onclick="playFirstSong();"><img class='play' src='assets/images/icons/play-white.png' width="10" height="10" >&nbsp;PLAY</button>
			</div>
		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>	
	</div>
</div>

			
	