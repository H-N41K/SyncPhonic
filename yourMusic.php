<?php
include("includes/includedFiles.php");
?>

<div class="playlistsContainer">

	<div class="gridViewContainer">
		<h1 class="pageHeadingBig">📇YOUR PLAYLISTS 🎼</h1>

		<div class="buttonItems">
			<button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>
		</div>



		<?php
			$username = $userLoggedIn->getUsername();

			$playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$username'");

			if(mysqli_num_rows($playlistsQuery) == 0) {
				echo "<span class='noResults'>You don't have any playlists yet.</span>";
			}

			while($row = mysqli_fetch_array($playlistsQuery)) {

				$playlist = new Playlist($con, $row);

				echo "<div class='gridViewItem' role='link' tabindex='0' 
							onclick='openPage(\"playlist.php?playlistId=" . $playlist->getId() . "\")'>

						<div class='playlistImage'>
							<img src='assets/images/icons/playlist.png'>
						</div>
						
						<div class='gridViewInfo'>"
							. $playlist->getName() .
						"</div>

					</div>";



			}
		?>






	</div>

</div>