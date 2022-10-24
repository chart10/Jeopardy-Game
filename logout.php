<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->


<!-- TODO: If we can manage to get the question results to delay before returning
     TODO: to the game board, it might be a good idea to make this page do something
     TODO: similar.
 -->
<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Log Out</title>
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
