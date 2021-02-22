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
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{	
		
		$statement = $crudCon->prepare("
			INSERT INTO genres (name) 
			VALUES (:name)
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["genres_name"],
			)
		);
		if(!empty($result))
		{
			echo 'New Genre Inserted Successfully!';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $crudCon->prepare(
			"UPDATE genres
			SET name = :name
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["genres_name"],
				':id'			=>	$_POST["genres_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Genre Details Updated Successfully';
		}
	}
}

?>