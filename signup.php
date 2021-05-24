<?php
	include("includes/config.php");
  
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");

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
    <title>Signup-BTechRooms</title>

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
                    <li><a href="">Rooms</a></li>
                    <li><a href="">CheckIn</a></li>
                    <li><a href="">CheckOut</a></li>
                    <li><a href="login.php">Login | Logout</a></li>
                </ul>
            </nav>
            <img src="assets/images/menu.png" class="menu-icon" alt="menu" onclick="togglemenu()">

        </div>



        <div class="display-container">
            <div class="jumbotron heading" style="justify-content: space-between;">
                <h1 style="margin: 0 20px;">Room Services </h1>
                <h3 style="margin: 0 20px;"><a href="login.php">Log in</a></h3>
            </div>

            <div id="content" class="content">

                <form id="signupUserForm" action="signup.php" method="POST">
                    <h2>Sign up as student</h2>
                    <br>
                    <?php
                        echo $account->getBulkError();
                    ?>                   

                    <div class="form-group">
                        <label for="fullName">Full name: </label>
                        <input id="fullName" name="fullName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('fullName') ?>" required>
                    </div>                  

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input id="password" name="password" type="password" placeholder="Your password" required>
                    </div>

                    <div class="form-group">
                        <label for="password2">Confirm </br>password: </label>
                        <input id="password2" name="password2" type="password" placeholder="Your password" required>
                    </div>


                    <button id="signupButton" style="margin: 10px;" type="submit"  name="signupButton">SIGN UP</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Already have an account?
                            <a href="login.php" style="color: var(--primaryColor);" id="loginLink">Login here.</a>
                        </span>
                    </div>
                </form>
            </div>

        </div>

        <script src="assets/js/main.js"></script>
</body>

</html>