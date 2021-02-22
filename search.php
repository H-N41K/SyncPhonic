<?php
include("includes/includedFiles.php");



if(isset($_GET['term']))
{
    $term = urldecode($_GET['term']);
}
else
{
    $term = "";
}
?>
<div class="searchContainer">

	<h4>Search for an artist, album or song</h4>
	<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing ..."/>

</div>

<script>

$(function() {
	// var timer;
   // $(".searchInput").focus();
	$(".searchInput").keyup(function() {
		clearTimeout(timer);

		timer = setTimeout(function() {
			var val = $(".searchInput").val();
			openPage("search.php?term=" + val);
		}, 2000);

	})


})

</script>

<?php if($term == "") exit();?>
<!-- Song search -->
<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
        <?php 
        
            $songQuery = mysqli_query($con,"SELECT id FROM songs WHERE title LIKE '%$term%' LIMIT 10");

            if(mysqli_num_rows($songQuery) == 0)
            {
                echo "<span class='noResults'>No songs found matching ' " . $term ." '</span>";
            }


			$songIdArray = array();
			$i = 1;
			while ($row = mysqli_fetch_array($songQuery)) {
				if($i > 15){
					break;
                }
                
                array_push($songIdArray,$row['id']);
				$albumSong = new Song($con, $row['id']);
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
				$i++;?>
					<nav class="shareMenu" data-share-id='<?php echo $albumSong->getId();?>'>
	Share:
	<a href="whatsapp://send?text=*Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>* &nbsp;<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>

	<a href="https://twitter.com/intent/tweet?text=Check Out This Song on SyncPhonic: <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&url=<?php echo $ROOT_URL?>song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>

	<a href="https://www.facebook.com/sharer.php?t=Check Out This Song on SyncPhonic : <?php echo $albumSong->getTitle()." by ".$albumArtist->getName(); ?>&u=<?php echo $ROOT_URL?>/song.php?songId=<?php echo $albumSong->getId();?>" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
	</nav>
				<?php
			}
		?>
		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray);?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>
	</ul>	
</div>

<!-- Artist search -->
<div class="artistsContainer borderBottom">

    <h2>ARTISTS</h2>

    <?php

        $artistQuery = mysqli_query($con , "SELECT * FROM artists WHERE name LIKE '%$term%' LIMIT 10");

        
        if(mysqli_num_rows($artistQuery) == 0)
        {
            echo "<span class='noResults'>No artist found matching ' " . $term ." '</span>";
        }
 		echo "<div class='searchResultRow'>";
        while($row = mysqli_fetch_array($artistQuery))
        {
			$artistFound = new Artist($con ,$row['id']);
			$url = $artistFound->getImageUrl();

            echo "
					<div class='artistName gridViewItem' role='link' tabindex='0' onclick='openPage(\"artist.php?artistId=". $artistFound->getId() ."\")'>
						<img src='$url' class=''>
						
                        	<div  class='gridViewInfo' >
                        
                            "
                            . $artistFound->getName() . 
                            "
                        
							</div>
						

                    </div>            
                ";
        }
        echo "</div>";

    ?>

</div>

<!-- album search -->
<div class="gridViewContainer">
	<h2>ALBUMS</h2>
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '%$term%' LIMIT 10");

		if(mysqli_num_rows($albumQuery) == 0)
        {
            echo "<span class='noResults'>No albums found matching ' " . $term ." '</span>";
        }

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