<?php 

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


if(isset($_POST['registerButton'])) {
	//Register button was pressed
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);
	$activationCode = rand(100000,999999);
	$wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2,$activationCode);
	if($wasSuccessful == true) {

		include("includes/classes/php-mailjet-v3-simple.class.php");
		$html_part = file_get_contents("includes/mailTemplates/template0.html");
$html1 = file_get_contents("includes/mailTemplates/template1.html");
$link = $ROOT_URL.'/activate.php?username='.$username.'&code='.$activationCode;
$html2 = file_get_contents("includes/mailTemplates/template2.html");
$html_part .= $username.$html1.$link.$html2;
$mj = new Mailjet('API_KEY','API_CRED');
    $params = array(
        "method" => "POST",
        "from" => "sender@gmail.com",
        "to" => $email,
        "subject" => "✔️ Account Activation of ".$username." | SyncPhonic 🎵",
        "html" => $html_part
    );

    $result = $mj->sendEmail($params);

    if ($mj->_response_code == 200)
 		$account->emailSentMsg();
    else
       $account->emailErrorMsg();
	}

}


?>