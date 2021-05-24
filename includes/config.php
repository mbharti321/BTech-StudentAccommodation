<?php
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Calcutta");

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "student_accommodation";

	// Create connection
	$con = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>