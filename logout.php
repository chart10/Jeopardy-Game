<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->


<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Log In</title>
    </head>
    <body>
        <h1>Log Out</h1>
        <div class="block-text"><?php
        session_start();
        echo "Logging you out, " . $_SESSION["username"] . "! <br/>";

        unset($_SESSION["username"]);
        unset($_SESSION["password"]);

        session_destroy();

        echo "You have logged out!<br/>";
        echo "<a href='login.php'>Return to login?</a>"
        ?></div>
        <p class="instructions">Click <a href="gameboard.php">here</a> to go to the game!</p>
        <p class="instructions">Click <a href="test.php">here</a> to test!</p>
        <p class="instructions">Don't have an account? <a href="registration.php">Create one here!</a></p>
        <p class="instructions"><a href="logout.php">Log out here!</a></p>
    </body>
</html>
