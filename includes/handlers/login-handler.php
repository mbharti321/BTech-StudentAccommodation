<?php

//LoginUser button was pressed
if(isset($_POST['loginUserButton'])) {
	
	$userEmail = $_POST['loginUserEmail'];
	$password = $_POST['loginUserPassword'];

	$result = $account->loginUser($userEmail, $password);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $userEmail;
		header("Location: user.php");
	}
}

//LoginAdmin button was pressed
if(isset($_POST['loginAdminButton'])) {
	
	$adminEmail = $_POST['loginAdminEmail'];
	$password = $_POST['loginAdminPassword'];

	$result = $account->loginAdmin($adminEmail, $password);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $adminEmail;
		header("Location: admin.php");
	}
}
?>