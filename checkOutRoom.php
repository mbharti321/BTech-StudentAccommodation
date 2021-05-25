<?php
	include("includes/config.php");


	if(isset($_GET['id'])) {
      $roomId = $_GET['id'];
    }
    else {
      header("Location: user.php");
    }


    $chechOutQuery ="UPDATE rooms SET roomAllocated = 0 where roomId ='$roomId'";
    $QryResult = mysqli_query($con, $chechOutQuery);
    if($QryResult)  {
    	echo "<script> alert('Room checked out successfully...'); </script>";
    	header("Location: user.php");
    }
    else{
    	echo "<script> alert('Some wrong occured!!'); </script>";
    	header("Location: user.php");
    }

?>