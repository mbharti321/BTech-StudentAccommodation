<?php
	include("includes/config.php");
  
    //resetting session 
    if(isset($_SESSION['userLoggedIn'])) {
        session_destroy();
        session_start();
    }
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	// include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

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
    <title>Login-BTechRooms</title>

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
                <h3 style="margin: 0 20px;"><a href="login.php">Login</a></h3>
            </div>

            <div id="content" class="content">

                <form id="loginUserForm" action ="login.php" method="POST">
                    <h2>Login as student</h2>
                    <br>
                    <?php echo $account->getError(Constants::$loginUserFailed); ?>
                    <div class="form-group">
                        <?php 
                        // echo $account->getError(Constants::$loginFailed); 
                        ?>
                        <label for="loginUserEmail">User email id:&nbsp;</label>
                        <input id="loginUserEmail" name="loginUserEmail" type="text" placeholder="e.g. bart@abcd.xyz" value="<?php getInputValue('loginUserEmail') ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="loginUserPassword">Password: </label>
                        <input id="loginUserPassword" name="loginUserPassword" type="password" placeholder="Your password"
                            required>
                    </div>

                    <button id="loginUserButton" style="margin: 10px;"  type="submit" name="loginUserButton">LOG IN</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet?
                            <a href="signup.php" style="color: var(--primaryColor);" id="signupLink" >Signup here.</a>
                        </span>
                    </div>
                </form>

                <!-- Login as admin -->
                <form id="loginAdminForm" method="POST">
                    <h2>Login as Admin</h2>
                    <br>
                    
                    <?php echo $account->getError(Constants::$loginAdminFailed); ?>
                    <div class="form-group">
                        <label for="loginAdminEmail">User email id:&nbsp;</label>
                        <input id="loginAdminEmail" name="loginAdminEmail" type="text" placeholder="e.g. bart@abcd.xyz" value=""
                            required>
                    </div>
                    <div class="form-group">
                        <label for="loginAdminPassword">Password: &nbsp;</label>
                        <input id="loginAdminPassword" name="loginAdminPassword" type="password" placeholder="Your password"
                            required>
                    </div>

                    <button id="loginAdminButton" style="margin: 10px;"  type="submit" name="loginAdminButton">LOG IN</button>
                   
                </form>
            </div>

        </div>        
        <script src="assets/js/main.js"></script>
</body>

</html>