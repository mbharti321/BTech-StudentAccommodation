<?php 

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	// $inputText = str_replace(" ", "", $inputText);
	// $inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


if(isset($_POST['signupButton'])) {
	//Register button was pressed
	$fullName = sanitizeFormString($_POST['fullName']);
	$email = sanitizeFormString($_POST['email']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->registerUser($fullName, $email, $password, $password2);

	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $email;
		header("Location: user.php");
	}

}


?>