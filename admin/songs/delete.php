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
include("function.php");

if(isset($_POST["songs_id"]))
{
	$path = get_audio_path($_POST["songs_id"]);
	if($path != '')
	{
		unlink("../../" . $path);
	}
	$statement = $crudCon->prepare(
		"DELETE FROM songs WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["songs_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>