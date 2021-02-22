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

if(isset($_POST["reset_token"]))
{

	
	$statement = $crudCon->prepare(
		"UPDATE songs SET plays = 0"
	);
	$result = $statement->execute();
	if(!empty($result))
	{
		echo 'Trending List has been reset successfully!';
	}
}


?>