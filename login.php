<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->
<?php
session_start();

if(isset($_SESSION['username'])){ //if user is already logged in, redirect the user to the game
    header('URL = gameboard.php');
}

//connect to database
$database = mysqli_connect('localhost', 'jkouttu1', 'jkouttu1', 'jkouttu1');
//if there is an error connecting to the database, stop the script and display the error
if (mysqli_connect_errno()) {
// If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$msg = '';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($database, $_POST['username']);
    $password = mysqli_real_escape_string($database, $_POST['password']);

    if(empty($_POST['username'])){
        $msg = "Please enter username";
    }

    if(empty($_POST['password'])){
        $msg = "Please enter password";
    }

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $login_result = mysqli_query($database, $query);
    //query the database for a row with a matching username and password

    if (mysqli_num_rows($login_result) == 1) {
        //if a matching user was found, log in is suggessful! Redirect to game
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $_POST['username'];

        header('Refresh: 0; URL = gameboard.php');
    }
    else {
        $msg = 'Incorrect username or password';
    }
}
?>

<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
    </head>
    <body>
        <h1>Log In</h1>
        <div class="block-text"><p>Fill out your username and password to log in!</p>

            <form action="" method="post">
                <h4><?php echo $msg; ?></h4>
                <label class="userprompt">Username: </label>
                <input class="usertext" type="text" name="username" placeholder="Username" required autofocus/><br/><br/>
                <label>Password: </label>
                <input class="usertext" type="password" name="password" placeholder="Password" required/><br/><br/>
                <button class="userprompt" type="submit" name="login" value="Log In"/>Log In<br/>
            </form>
        </div>

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
