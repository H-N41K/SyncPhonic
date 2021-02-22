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
		$date = date("Y-m-d");
		$statement = $crudCon->prepare("
			INSERT INTO users (username,firstName,lastName,email,type,password,signUpDate,premiumValidity) 
			VALUES (:username,:firstname,:lastname,:email,:type,:password,:signupdate,:premiumValidity)
		");
		$result = $statement->execute(
			array(
				':username'	=>	$_POST["users_username"],
				':firstname'	=>	$_POST["users_firstname"],
				':lastname'	=>	$_POST["users_lastname"],
				':email'	=>	$_POST["users_email"],
				':type'	=>	$_POST["users_type"],
				':password'	=>	md5($_POST["users_password"]),
				':signupdate' => $date,
				':premiumValidity'	=>	$_POST["users_premiumValidity"]
			)
		);
		if(!empty($result))
		{
			echo 'New User Inserted Successfully!';
		}
	}
	if($_POST["operation"] == "Edit")
	{	

		$statement = $crudCon->prepare(
			"UPDATE users 
			SET username = :username, firstName = :firstname, lastName = :lastname , email = :email, password = :password , type = :type , premiumValidity = :premiumValidity
			WHERE id = :id
			"
		);
		if(isset($_POST["users_password"]) && $_POST["users_password"] != ''){
			$password = md5($_POST["users_password"]);
		}else{
			$password = $_POST["hidden_users_password"];
		}
		$result = $statement->execute(
			array(
				':username'	=>	$_POST["users_username"],
				':firstname'	=>	$_POST["users_firstname"],
				':lastname'	=>	$_POST["users_lastname"],
				':email'	=>	$_POST["users_email"],
				':type'	=>	$_POST["users_type"],
				':password'	=>	$password,
				':premiumValidity'	=>	$_POST["users_premiumValidity"],
				':id'			=>	$_POST["users_id"]
			)
		);
		if(!empty($result))
		{
			echo 'User Details Updated Successfully';
		}
	}
}

?>