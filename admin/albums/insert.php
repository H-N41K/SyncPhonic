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
		$artworkPath = '';
		if($_FILES["albums_image"]["name"] != '')
		{
			$artworkPath = upload_image();
		}
		$statement = $crudCon->prepare("
			INSERT INTO albums (title, artworkPath,genre,artist) 
			VALUES (:title,:artworkPath,:genre,:artist)");
		$statement->bindParam(':title', $_POST["albums_name"], PDO::PARAM_STR);
		$statement->bindParam(':artworkPath', $artworkPath, PDO::PARAM_STR);
		$statement->bindParam(':genre', $_POST["albums_genre"], PDO::PARAM_INT);
		$statement->bindParam(':artist', $_POST["albums_artist"], PDO::PARAM_INT);
		$result = $statement->execute();
		if(!empty($result))
		{
			echo 'New Album Inserted Successfully!';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$artworkPath = '';
		if($_FILES["albums_image"]["name"] != '')
		{
			$artworkPath = upload_image();
		}
		else
		{
			$artworkPath = $_POST["hidden_albums_image"];
		}
		$statement = $crudCon->prepare(
			"UPDATE albums 
			SET title = :title, artworkPath = :artworkPath , genre = :genre ,artist = :artist
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':title'	=>	$_POST["albums_name"],
				':artworkPath'		=>	$artworkPath,
				':id'			=>	$_POST["albums_id"],
				':genre'		=>	$_POST["albums_genre"],
				':artist'		=>	$_POST["albums_artist"]
			)
		);
		if(!empty($result))
		{
			echo 'Album Details Updated Successfully';
		}
	}
}

?>