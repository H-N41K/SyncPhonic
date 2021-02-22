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
if(isset($_POST["songs_id"]))
{
	$output = array();
	$statement = $crudCon->prepare(
		"SELECT * FROM songs 
		WHERE id = '".$_POST["songs_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["songs_title"] = $row["title"];
		$output["songs_artist"] = $row["artist"];
		$output["songs_artist2"] = $row["artist2"];
		$output["songs_artist3"] = $row["artist3"];
		$output["songs_artist4"] = $row["artist4"];
		$output["songs_album"] = $row["album"];
		$output["songs_genre"] = $row["genre"];
		$output["songs_albumorder"] = $row["albumOrder"];
		$output["songs_plays"] = $row["plays"];
		if($row["path"] != '')
		{
			$output['songs_audio'] = '<audio controls>
										<source src="../../'.$row["path"].'" type="audio/mpeg" preload="none" width="100" height="100" />
										</audio>
				<input type="hidden" name="hidden_songs_audio" value="'.$row["path"].'" >
				<input type="hidden" name="hidden_songs_duration" value="'.$row["duration"].'" >';
		}
		else
		{
			$output['songs_audio'] = '<input type="hidden" name="hidden_songs_audio" value="" />
									<input type="hidden" name="hidden_songs_duration" value="" />';
		}
	}
	echo json_encode($output);
}
?>