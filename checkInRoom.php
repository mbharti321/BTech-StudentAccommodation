<?php
	include("includes/config.php");


	if(isset($_GET['id'])) {
      $roomId = $_GET['id'];
    }
    else {
      header("Location: user.php");
    }


    $chechInQuery ="UPDATE rooms SET roomAllocated = 1 where roomId ='$roomId'";
    $QryResult = mysqli_query($con, $chechInQuery);
    if($QryResult)  {
    	echo "<script> alert('Room checked in successfully...'); </script>";
    	header("Location: user.php");
    }
    else{
    	echo "<script> alert('Some wrong occured!!'); </script>";
    	header("Location: user.php");
    }

?>