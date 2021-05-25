<?php
include("includes/config.php");

include("includes/classes/Room.php");
include("includes/classes/Constants.php");

$room = new Room($con);

if (isset($_SESSION['adminLoggedIn'])) {
    $userLoggedIn = $_SESSION['adminLoggedIn'];
} else {
    header("Location: login.php");
}

include("includes/handlers/room-handler.php");

    function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-BTechRooms</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <a href="index.php"><img src="assets/images/logo.png" class="logo" alt="logo"></a>
            <nav>
                <ul id="menuList">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="newRoom.php">New Room</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </nav>
            <img src="assets/images/menu.png" class="menu-icon" alt="menu" onclick="togglemenu()">

        </div>



        <div class="display-container">
            <div class="jumbotron heading">
                <h1 style="margin: 0 20px; text-align: center;">Admin</h1>
            </div>

            <div id="content" class="content">

                <form id="signupUserForm" action="newRoom.php" method="POST">
                    <h2>Insert new room details</h2>
                    <!-- `roomId`, `roomType`, `roomLocation`, `monthlyCharge`, 
                    `roomAllocated`, `paymentStatus`, `roomAdditionTime` -->
                    <br>
                    <?php
                        echo $room->getBulkError();
                    ?>

                    <div class="form-group">
                        <label for="roomId">Room Id: </label>
                        <input id="roomId" name="roomId" type="text"
                            value="Auto generated" required disabled>
                    </div>

                    <div class="form-group">
                        <label for="roomType">Room Type: </label>
                        <input id="roomType" name="roomType" type="text" placeholder="1BHK/ 2BHK/ 3BHK .."
                            value="<?php getInputValue('roomType') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="roomLocation">Room Location: </label>
                        <input id="roomLocation" name="roomLocation" type="text" placeholder=" Enter address"
                            value="<?php getInputValue('roomLocation') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="monthlyCharge">Monthly Charge: </label>
                        <input id="monthlyCharge" name="monthlyCharge" type="text" placeholder=" Enter monthly charge "
                            value="<?php getInputValue('monthlyCharge') ?>" required>
                    </div>                


                    <button id="insertRoomButton" style="margin: 10px;" type="submit" name="insertRoomButton">Insert Room</button>
                    
                </form>

            </div>

        </div>


        <script src="assets/js/main.js"></script>
</body>

</html>