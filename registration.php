<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->

<!-- Registration page -->

<?php
session_start();

if(isset($_SESSION['username'])){ //if user is already logged in, redirect the user to the game
    header('Refresh: 0; URL = gameboard.php');
}

//connect to database
$database = mysqli_connect('localhost', 'root', '', 'users');
//if there is an error connecting to the database, stop the script and display the error
if (mysqli_connect_errno()) {
// If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$msg = '';

if(isset($_POST['register'])){
    //receive input from the form
    $username = mysqli_real_escape_string($database, $_POST['username']);
    $password = mysqli_real_escape_string($database, $_POST['password']);

    if(empty($username)){ //if username field was left empty, ask to fill the username
        $msg = "A username is required!";
    }
    if(empty($password)){ //if password was left empty, ask to enter a password !!!!!!
        $msg = "A password is required!";
    }

    // first check the database to ensure a user does not already exist with the same username
    $username_check = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($database, $username_check);
    $user = mysqli_fetch_assoc($result);

    if($user){ //if the user already exists
        $msg = "Username already exists. Please select a unique username.";
    }

    if(empty($msg)){ //if no error occurred, enter the user's information into the database
        $query = "INSERT INTO users (username, password) 
  			  VALUES('$username', '$password')";
        mysqli_query($database, $query);
        $_SESSION['username'] = $username;
        $_SESSION['valid'] = true;
        $_SESSION['success'] = "You are now logged in";
        $msg = "You have registered, and are now logged in!";
        header('Refresh: 2; URL = gameboard.php'); //redirect user to game
    }
}

?>
<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Registration</title>
    </head>

    <body>
        <h1>Registration</h1>
        <div class="block-text">
            <p>Fill out your information to create an account!</p>
            <form action="" method="post">
                <legend><h2><?= $msg?></h2></legend>
                <label class="userprompt">Username:&nbsp&nbsp</label>
                <input class="usertext" type="text" name="username" placeholder="Username" required/><br/><br/>
                <label class="userprompt">Password:&nbsp&nbsp</label>
                <input class="usertext" type="password" name="password" placeholder="Password" required/><br/><br/>
                <button type="submit" name="register" value="Register"/> Register<br/>
            </form>
        </div>
        <p>Already have an account? <a href="login.php">Log in here!</a></p>
        <div class="footer">
            <ul>
                <li><a href="frontpage.php">Home</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="gameboard.php">Game Board</a></li>
                <li><a href="leaderboard.php">Leaderboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </body>
</html>