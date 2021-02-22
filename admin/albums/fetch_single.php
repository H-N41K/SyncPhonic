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
if(isset($_POST["albums_id"]))
{
	$output = array();
	$statement = $crudCon->prepare(
		"SELECT * FROM albums 
		WHERE id = '".$_POST["albums_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["albums_name"] = $row["title"];
		$output["albums_genre"] = $row["genre"];
		$output["albums_artist"] = $row["artist"];
		if($row["artworkPath"] != '')
		{
			$output['albums_image'] = '<img src="../../'.$row["artworkPath"].'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_albums_image" value="'.$row["artworkPath"].'" />';
		}
		else
		{
			$output['albums_image'] = '<input type="hidden" name="hidden_albums_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>