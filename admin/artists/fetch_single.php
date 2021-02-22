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
if(isset($_POST["artists_id"]))
{
	$output = array();
	$statement = $crudCon->prepare(
		"SELECT * FROM artists 
		WHERE id = '".$_POST["artists_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["artists_name"] = $row["name"];
		$output["artists_description"] = $row["description"];
		if($row["imageUrl"] != '')
		{
			$output['artists_image'] = '<img src="../../'.$row["imageUrl"].'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_artists_image" value="'.$row["imageUrl"].'" />';
		}
		else
		{
			$output['artists_image'] = '<input type="hidden" name="hidden_artists_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>