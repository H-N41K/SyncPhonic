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
if(isset($_POST["genres_id"]))
{
	$output = array();
	$statement = $crudCon->prepare(
		"SELECT * FROM genres 
		WHERE id = '".$_POST["genres_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["genres_name"] = $row["name"];
	}
	echo json_encode($output);
}
?>