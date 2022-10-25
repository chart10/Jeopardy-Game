<!-- Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->

<!-- Logs the user out -->

<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Log Out</title>
    </head>
    <body>
        <h1>Log Out</h1>
        <div class="block-text"><?php
        session_start();
        echo "Logging you out! <br/><br/>";

        unset($_SESSION["username"]);

        session_unset();
        session_destroy();

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
                <li><a href="credits.php">Credits</a></li>
            </ul>
        </div>
    </body>
</html>
