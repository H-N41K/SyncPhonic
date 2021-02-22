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
function get_total_all_records()
{
	include('../db.php');
	$statement = $crudCon->prepare("SELECT * FROM genres");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>