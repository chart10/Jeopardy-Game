<!-- Christian Hart, Jamie Kouttu, Alex Diaz -->

<!-- TODO: (Christian) This page should be all set, but it skips through too fast for the user to read.
     TODO: Find a way for this page to remain on screen for a few seconds, maybe with a sleep() function.-->
<?php
session_start();
$dataImp=$_POST["answers"]; //receive data in format (user answer),(correct answer),(question value)
$answer=explode(",",$dataImp);
$corAnswer=$answer[1];
$value=$answer[2];
$userInput = 0;
?>
<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Log Out</title>
    </head>
    <body class="jepBoard">

        <?php if($answer[0]==$corAnswer){ ?>
            <div class="block-text"><p>That's correct! $<?php print($value) ?> is added too your score!</p></div>
            <?php $_SESSION['score'] = $_SESSION['score'] + $value; //add to score!!!!!
            $userInput = 1;
        }
        else { ?>
            <div class="block-text"><p>I'm afraid that's incorrect! $<?php print($value) ?> is subtracted from your score!</p></div>
            <?php $_SESSION['score'] = $_SESSION['score'] - $value;
            $userInput = 2;
        }

        $qnum = "q" . $answer[3];       // This is the question number
        $_SESSION[$qnum] = $userInput;  // Update the session to hold a 1 or 2 for this particular question

        header('Refresh: 1; URL = gameboard.php');
        ?>

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


