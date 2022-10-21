<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->
<?php
session_start();

if(isset($_SESSION['username'])){ //if user is already logged in, redirect the user to the game
    header('URL = gameboard.php');
}

//connect to database
$database = mysqli_connect('localhost', 'root', '', 'users');
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
    <title>Log In</title>
</head>

<body>
<h2>Log In</h2>
<p>Fill out your username and password to log in!</p>

<form action="" method="post">
    <h4><?php echo $msg; ?></h4>
    <label>Username: </label>
    <input type="text" name="username" placeholder="Username" required autofocus/><br/>
    <label>Password: </label>
    <input type="password" name="password" placeholder="Password" required/><br/>
    <input type="submit" name="login" value="Log In"/><br/>
</form>
<p>Click <a href="gameboard.php">here</a> to go to the game!</p>
<p>Click <a href="test.php">here</a> to test!</p>
<p>Don't have an account? <a href="registration.php">Create one here!</a></p>
<p><a href="logout.php">Log out here!</a></p>
</body>
</html>
