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
		$imageUrl = '';
		if($_FILES["artists_image"]["name"] != '')
		{
			$imageUrl = upload_image();
		}
		$statement = $crudCon->prepare("
			INSERT INTO artists (name, imageUrl) 
			VALUES (:name,:imageUrl)
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["artists_name"],
				':description'	=>	$_POST["artists_description"],
				':imageUrl'		=>	$imageUrl
			)
		);
		if(!empty($result))
		{
			echo 'New Artist Inserted Successfully!';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$imageUrl = '';
		if($_FILES["artists_image"]["name"] != '')
		{
			$imageUrl = upload_image();
		}
		else
		{
			$imageUrl = $_POST["hidden_artists_image"];
		}
		$statement = $crudCon->prepare(
			"UPDATE artists 
			SET name = :name, description = :description, imageUrl = :imageUrl 
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["artists_name"],
				':description'	=>	$_POST["artists_description"],
				':imageUrl'		=>	$imageUrl,
				':id'			=>	$_POST["artists_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Artist Details Updated Successfully';
		}
	}
}

?>