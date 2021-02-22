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
function upload_image()
{
	if(isset($_FILES["artists_image"]))
	{
		$extension = explode('.', $_FILES['artists_image']['name']);
		$new_name = rand().rand().rand() . '.' . $extension[1];
		$dirPrefix = 'assets/images/artists/';
		$destination = '../../' .$dirPrefix. $new_name;
		move_uploaded_file($_FILES['artists_image']['tmp_name'], $destination);
		return $dirPrefix.$new_name;
	}
}

function get_image_name($user_id)
{
	include('../db.php');
	$statement = $crudCon->prepare("SELECT imageUrl FROM artists WHERE id = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["imageUrl"];
	}
}

function get_total_all_records()
{
	include('../db.php');
	$statement = $crudCon->prepare("SELECT * FROM artists");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>