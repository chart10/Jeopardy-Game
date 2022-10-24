<!-- Christian Hart, Jamie Kouttu, Alex Diaz-->

<!-- This page should display a leaderboard of top scores of users
     TODO: Design this page to display the Leaderboard and make it look good
-->
<?php
    $database = mysqli_connect('localhost', 'root', 'root', 'users');
    //if there is an error connecting to the database, stop the script and display the error
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $query = "SELECT username, topscore FROM users order by topscore desc";
    $result = mysqli_query($database, $query);
?>

<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Leaderboard</title>
    </head>
    <body>
        <h1>Leaderboard</h1>
        <div class="block-text">
            <table>
                <?php if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                        <?php printf("$%s - %d <br/>",
                            $row["username"],
                            $row["topscore"]
                        ); ?>
                        </tr>
                    <?php }
                }
                ?>
            </table>
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
