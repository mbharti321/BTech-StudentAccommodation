<?php
include("includes/config.php");

include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

if(isset($_SESSION['adminLoggedIn'])) {
  $adminLoggedIn = $_SESSION['adminLoggedIn'];
}
else {
  header("Location: login.php");
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
                <div style="overflow: scroll;">

                    <?php
        // `rooms`(`roomId`, `roomType`, `roomLocation`, `monthlyCharge`, 
        // `roomAllocated`, `paymentStatus`, `roomAdditionTime`)
        $roomDetails = mysqli_query($con, "SELECT * FROM rooms");
        if (mysqli_num_rows($roomDetails) == 0) {
          echo '<span class="emptyRecord"> 
                  There is no room to be shown...</br>
                  <a href="newRoom.php">Insert New Room</a>
                  </span>';
          return;
        }

        echo '<table class = "cssTable" >
                  <tr class= "tableHeader">
                    <th >RoomId</th>
                    <th >Type</th>
                    <th >Location</th>
                    <th >MonthlyCharge(₹)</th>
                    <th >Allocated?</th>
                    <th >PayStatus</th>
                    <th >Action</th>
                  </tr>';

                  while ($row = mysqli_fetch_array($roomDetails)) {
                    echo '<tr  align = "center">';          
                      echo "<td>" . $row['roomId'] . "</td>";
                      echo "<td>" . $row['roomType'] . "</td>";
                      echo "<td>" . $row['roomLocation'] . "</td>";
                      echo "<td>" . $row['monthlyCharge'] . "</td>";
                      echo "<td>" . $row['roomAllocated'] . "</td>";
                      echo "<td>" . $row['paymentStatus'] . "</td>";

                      echo '<td>
                              <div class="roomAction">
                                <span>
                                  <a href="editRoom.php?id=' . $row["roomId"] . '">Edit</a>
                                </span>
                                
                                <span>
                                  <a href="deleteRoom.php?id=' . $row["roomId"] . '" onclick = "return checkDelete()">Delete</a>
                                </span>
                              </div>
                            </td> ';
                    echo "</tr>";
                  }          
                echo "</table>";
        mysqli_close($con);
        ?>
                    <!--=================================
                          printing rooms -->
                </div>
            </div>

        </div>
        <script>
        function checkDelete() {
            return confirm('Are you sure you want to delete the perticular row ?');
        }
        </script>
        <script src="assets/js/main.js"></script>
</body>

</html>