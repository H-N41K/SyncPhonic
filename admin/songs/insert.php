<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: ../../index.php' ) );

    }
include('../db.php');
include('function.php');
include('MP3.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{	
		$songPath = '';
		if($_FILES["songs_audio"]["name"] != '')
		{
			$songPath = upload_audio();
		}
		$mp3file = new MP3File('../../'.$songPath);
		$duration = $mp3file->getDuration();
		$duration  = MP3File::formatTime($duration);
		$statement = $crudCon->prepare("
			INSERT INTO songs (title, artist, artist2, artist3, artist4, album, genre, duration, path, albumOrder, plays) 
			VALUES (:title, :artist, :artist2, :artist3, :artist4, :album, :genre,:duration, :path, :albumOrder, :plays)
		");
		$result = $statement->execute(
			array(
				':title'	=>	$_POST["songs_title"],
				':artist'	=>	$_POST["songs_artist"],
				':artist2'	=>	$_POST["songs_artist2"],
				':artist3'	=>	$_POST["songs_artist3"],
				':artist4'	=>	$_POST["songs_artist4"],
				':album'	=>	$_POST["songs_album"],
				':genre'	=>	$_POST["songs_genre"],
				':duration'	=>	$duration,
				':path'	=>	$songPath,
				':albumOrder'	=>	$_POST["songs_albumorder"],
				':plays'	=>	$_POST["songs_plays"],

			)
		);

		if(!empty($result))
		{
			echo 'New Song Inserted Successfully!';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$songPath = '';
		if($_FILES["songs_audio"]["name"] != '')
		{
			$songPath = upload_audio();
			$mp3file = new MP3File('../../'.$songPath);
			$duration = $mp3file->getDuration();
			$duration  = MP3File::formatTime($duration);
		}
		else
		{
			$songPath = $_POST["hidden_songs_audio"];
			$duration = $_POST["hidden_songs_duration"];
		}
		$statement = $crudCon->prepare(
			"UPDATE songs 
			SET title = :title, artist = :artist , artist2 = :artist2 , artist3 = :artist3 , artist4 = :artist4 , album = :album , genre = :genre, duration = :duration, path = :path , albumOrder = :albumOrder , plays = :plays
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':title'	=>	$_POST["songs_title"],
				':artist'	=>	$_POST["songs_artist"],
				':artist2'	=>	$_POST["songs_artist2"],
				':artist3'	=>	$_POST["songs_artist3"],
				':artist4'	=>	$_POST["songs_artist4"],
				':album'	=>	$_POST["songs_album"],
				':genre'	=>	$_POST["songs_genre"],
				':duration'	=>	$duration,
				':path'	=>	$songPath,
				':albumOrder'	=>	$_POST["songs_albumorder"],
				':plays'	=>	$_POST["songs_plays"],
				':id'			=>	$_POST["songs_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Song Details Updated Successfully';
		}
	}
}

?>