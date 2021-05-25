<?php 

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	// $inputText = str_replace(" ", "", $inputText);
	// $inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


if(isset($_POST['insertRoomButton'])) {
	//insertRoomButton  was pressed
	$roomType = sanitizeFormString($_POST['roomType']);
	$roomLocation = sanitizeFormString($_POST['roomLocation']);
	$monthlyCharge = sanitizeFormString($_POST['monthlyCharge']);
	
	$wasSuccessful = $room->addRoom($roomType, $roomLocation, $monthlyCharge);

	if($wasSuccessful == true) {
    	echo "<script> alert('New room inserted successfully..'); </script>";
		header("Location: admin.php");
	}
}


if(isset($_POST['updateRoomButton'])) {
	//insertRoomButton  was pressed
	// echo "<script> alert('insertRoomButton  was pressed'); </script>";
	$roomId = $room->getRoomId();
	$roomType = sanitizeFormString($_POST['roomType']);
	$roomLocation = sanitizeFormString($_POST['roomLocation']);
	$monthlyCharge = sanitizeFormString($_POST['monthlyCharge']);
	$roomAllocated = sanitizeFormString($_POST['roomAllocated']);
	$paymentStatus = sanitizeFormString($_POST['paymentStatus']);
	
	$wasSuccessful = $room->updateRoom($roomId, $roomType, $roomLocation, $monthlyCharge, $roomAllocated, $paymentStatus);

	if($wasSuccessful == true) {
    	echo "<script> alert('Room details updated successfully..'); </script>";
		header("Location: admin.php");
	}
	else{
		echo "<script> alert('Room details updated successfully..'); </script>";
	}

}


?>