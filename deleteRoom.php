<?php
	include("includes/config.php");


	if(isset($_GET['id'])) {
      $roomId = $_GET['id'];
    }
    else {
      header("Location: admin.php");
    }


    $deleteQuery ="DELETE from rooms where roomId ='$roomId'";
    $QryResult = mysqli_query($con, $deleteQuery);
    if($QryResult)  {
    	echo "<script> alert('Room deleted successfully...'); </script>";
    	header("Location: admin.php");
    }
    else{
    	echo "<script> alert('Some wrong occured!!'); </script>";
    	header("Location: admin.php");
    }

?>