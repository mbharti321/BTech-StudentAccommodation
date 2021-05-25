<?php
include("includes/config.php");

include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

if(isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
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
    <title>User-BTechRooms</title>


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
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </nav>
            <img src="assets/images/menu.png" class="menu-icon" alt="menu" onclick="togglemenu()">

        </div>



        <div class="display-container">
            <div class="jumbotron heading">
                <h1 style="margin: 0 20px;">User</h1>
            </div>

            <div id="content" class="content">
            
      <!--=================================
        printing checked in rooms -->
      <?php
        echo("<h3>Checked in rooms:</h3>");
        // `rooms`(`roomId`, `roomType`, `roomLocation`, `monthlyCharge`, 
        // `roomAllocated`, `paymentStatus`, `roomAdditionTime`)
        $checkedinRoom = mysqli_query($con, "SELECT * FROM rooms where roomAllocated = 1");
        if (mysqli_num_rows($checkedinRoom) == 0) {
          echo "<span class='emptyRecord'> There is no checked in room. </span>";
          // return;
        }
        else{
            echo '<table class = "cssTable">
                      <tr class= "tableHeader">
                        <th >RoomId</th>
                        <th >Type</th>
                        <th >Location</th>
                        <th >MonthlyCharge(₹)</th>
                        <th >Action</th>
                      </tr>';

                      while ($row = mysqli_fetch_array($checkedinRoom)) {
                        echo '<tr  align = "center">';          
                          echo "<td>" . $row['roomId'] . "</td>";
                          echo "<td>" . $row['roomType'] . "</td>";
                          echo "<td>" . $row['roomLocation'] . "</td>";
                          echo "<td>" . $row['monthlyCharge'] . "</td>";

                          echo '<td>
                                  <div class="roomAction">
                                    <span>
                                      <a href="checkOutRoom.php?id=' . $row["roomId"] . '">CheckOut</a>
                                    </span>
                                  </div>
                                </td> ';
                        echo "</tr>";
                      }          
                  echo "</table>";
           }
          //  mysqli_close($con);
        ?>
        <!--=================================
                  printing checked in rooms -->



        <!--=================================
        printing available rooms -->
      <?php
        echo("</br><h3>Available rooms:</h3>");
        // `rooms`(`roomId`, `roomType`, `roomLocation`, `monthlyCharge`, 
        // `roomAllocated`, `paymentStatus`, `roomAdditionTime`)
        $availableRoom = mysqli_query($con, "SELECT * FROM rooms where roomAllocated = 0");
        if (mysqli_num_rows($availableRoom) == 0) {
          echo "<span class='emptyRecord'> All rooms has been allocated. </span>";
          return;
        }

        echo '<table class = "cssTable">
                  <tr class= "tableHeader">
                    <th >RoomId</th>
                    <th >Type</th>
                    <th >Location</th>
                    <th >MonthlyCharge(₹)</th>
                    <th >Action</th>
                  </tr>';

                  while ($row = mysqli_fetch_array($availableRoom)) {
                    echo '<tr  align = "center">';          
                      echo "<td>" . $row['roomId'] . "</td>";
                      echo "<td>" . $row['roomType'] . "</td>";
                      echo "<td>" . $row['roomLocation'] . "</td>";
                      echo "<td>" . $row['monthlyCharge'] . "</td>";

                      echo '<td>
                              <div class="roomAction">
                                <span>
                                  <a href="checkInRoom.php?id=' . $row["roomId"] . '">CheckIn</a>
                                </span>
                              </div>
                            </td> ';
                    echo "</tr>";
                  }          
                echo "</table>";
           mysqli_close($con);
        ?>
        <!--=================================
                  printing available rooms -->

            </div>

        </div>
        <script>
          // function checkDelete() {
          //     return confirm('Are you sure you want to delete the perticular row ?');
          // }
        </script>
        <script src="assets/js/main.js"></script>
</body>

</html>