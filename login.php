<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->
<?php
session_start();
?>

<!doctype html>
<html lang="en/us">
<head>
    <title>Log In</title>
</head>

<body>
<h2>Log In</h2>
<p>Fill out your username and password to log in!</p>
    <?php
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])) {

        if ($_POST['password'] == '1234') {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $_POST['username'];

            echo 'Valid username and password';
        }else {
            $msg = 'Incorrect username or password';
        }
    }
    ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <h4><?php echo $msg; ?></h4>
    <label>Username: </label>
    <input type="text" name="username" placeholder="Username" required autofocus/><br/>
    <label>Password: </label>
    <input type="password" name="password" placeholder="Password" required/><br/>
    <input type="submit" name="login" value="Log In"/><br/>
</form>
<p>Click <a href="test.php">here</a> to test!</p>
<p>Don't have an account? <a href="registration.php">Create one here!</a></p>
<p><a href="logout.php">Log out here!</a></p>
</body>
</html>
