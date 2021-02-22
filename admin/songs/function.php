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

function upload_audio()
{
	if(isset($_FILES["songs_audio"]))
	{
		$filename = basename($_FILES["songs_audio"]['name']);
		$fileTmp  = $_FILES["songs_audio"]['tmp_name'];
		$fileSize = $_FILES["songs_audio"]['size'];
		$error    = $_FILES["songs_audio"]['error'];

		$ext = explode('.',$filename);
		$ext = strtolower(end($ext));
		$allowed_ext = array('mp3','wav');
		if(in_array( $ext, $allowed_ext) === true){
			if($error === 0){
				if($fileSize <= (20972152*6)){//12MB
					$fileRoot = 'assets/music/'.rand().rand().rand().'.'.$ext;
					move_uploaded_file($fileTmp, '../../'.$fileRoot);
					return $fileRoot;
				}else{
					return $error;
				}
			}else{
				return $error;
			}
		}
	}
}

function get_audio_path($id)
{
	include('../db.php');
	$statement = $crudCon->prepare("SELECT path FROM songs WHERE id = '$id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["path"];
	}
}

function get_total_all_records()
{
	include('../db.php');
	$statement = $crudCon->prepare("SELECT * FROM songs");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


?>