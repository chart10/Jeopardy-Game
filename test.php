<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->
<?php
session_start();
?>
<!doctype html>
<html lang="en/us">
<head>
    <title>TESTING session</title>
</head>

<body>
<?php
    if(isset($_SESSION['username'])){
        ?>
        <p>Hello, <?= $_SESSION['username'] ?>!</p>
        <p><a href="logout.php">Log out here!</a></p>
        <?php
    }
    else{
        ?>
        You aren't logged in. <a href="login.php">Log in here!</a>
        <?php
    }
?>
</body>

</html>
