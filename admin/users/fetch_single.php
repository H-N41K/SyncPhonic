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
if(isset($_POST["users_id"]))
{
	$output = array();
	$statement = $crudCon->prepare(
		"SELECT * FROM users 
		WHERE id = '".$_POST["users_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["users_username"] = $row["username"];
		$output["users_firstname"] = $row["firstName"];
		$output["users_lastname"] = $row["lastName"];
		$output["users_email"] = $row["email"];
		$output["users_password"] = $row["password"];
		$output["users_type"] = $row["type"];
		$output["users_premiumValidity"] = $row["premiumValidity"];
	}
	echo json_encode($output);
}
?>