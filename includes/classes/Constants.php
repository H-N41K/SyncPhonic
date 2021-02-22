<?php
class Constants {

	public static $passwordsDoNoMatch = "Your passwords don't match";
	public static $passwordNotAlphanumeric = "Your password can only contain numbers and letters";
	public static $passwordCharacters = "Your password must be between 5 and 30 characters";
	public static $emailInvalid = "Email is invalid";
	public static $emailsDoNotMatch = "Your emails don't match";
	public static $emailTaken = "This email is already in use";
	public static $lastNameCharacters = "Your last name must be between 2 and 25 characters";
	public static $firstNameCharacters = "Your first name must be between 2 and 25 characters";
	public static $usernameCharacters = "Your username must be between 5 and 25 characters";
	public static $usernameTaken = "This username already exists";

	public static $loginFailed = "Your username or password was incorrect";

	public static $activationRequired = "You need to activate your account before logging in. Please check your email!!";
	public static $emailSent = "An activation email has been sent .Please check your email!!";
	public static $emailError = "Error!! E-mail may not exist";

}
?>