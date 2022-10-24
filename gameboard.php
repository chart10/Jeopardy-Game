<!-- Christian Hart, Jamie Kouttu, Alex Diaz -->

<!-- This is where we should include the code for the main page of an active game.
TODO: HTML table of all questions in a Jeopardy grid layout. DONE!
TODO: Design PHP logic that links each dollar value to a question_answer page DONE!
TODO: Page should replace dollar value with "right"/"wrong" based on user answer DONE!
TODO: User div that displays username and score at the bottom of the page (logout option too) DONE!
TODO: Button that resets the game for the user?
TODO: (OPTIONAL) Randomize a box as "Daily Double" that allows the user to wager money
TODO: Link to leaderboard
-->

<?php
    session_start();
    // Initialize the session variables indicating whether each question has been answered at 0 at the start of the game
    for ($i = 1; $i <= 25; $i++){
        $question = "q" . $i;
        if(!isset($_SESSION[$question]))
            $_SESSION[$question] = 0;
    }

    // Need a function to run for each question which decides whether to display "right" or "wrong" if
    // the question has been answered
    function rightWrong($qnum, $num, $value) {
        if($_SESSION[$qnum] == 0){ ?>
            <button class="jepButton" type="submit" name="qnum" value="<?php print($num) ?>">$<?php print($value) ?></button></td>
        <?php } else if($_SESSION[$qnum] == 1){ ?>
            <button class="correct" type="submit" name="<?php print($qnum) ?>" value="<?php print($num) ?>" disabled>RIGHT!</button></td>
        <?php } else if($_SESSION[$qnum] == 2){ ?>
            <button class="wrong" type="submit" name="<?php print($qnum) ?>" value="<?php print($num) ?>" disabled>WRONG!</button></td>
            <?php }
    }
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Jeopardy Game Board</title>
    </head>
    <body class="jepBoard">
        <?php
        // If session username not set, direct user to log in
        if (!isset($_SESSION['username'])) {  ?>
            <div class="block-text">
                <h2>You are not logged in. <a href="login.php">Log in</a> or <a href="registration.php">register</a> to play!</h2>
            </div>
        <?php
        }
        else {      // Check if all questions have been answered
            $gameboardFinished = true;
            for ($i = 1; $i <= 25; $i++){
                $question = "q" . $i;
                if ($_SESSION[$question] == 0) {
                    $gameboardFinished = false;
                    break;
                }
            }
            //if all questions have been answered, show final score and link to leaderboard
            //and store the user's score in the database if it is better than their previous top score
            if ($gameboardFinished) {
                //connect to database
                $database = mysqli_connect('localhost', 'root', 'root', 'users');
                //if there is an error connecting to the database, stop the script and display the error
                if (mysqli_connect_errno()) {
                    // If there is an error with the connection, stop the script and display the error.
                    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $username = $_SESSION['username'];
                $query = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($database, $query); //query to find the row containing the username
                $user = mysqli_fetch_assoc($result);

                if ($user['topscore'] == null || $user['topscore'] < $_SESSION['score']) {
                    //if user has no top score, or their previous top score is less than their current score,
                    //update the top score in the database
                    $score = $_SESSION['score'];
                    $query = "UPDATE users SET topscore = '$score' WHERE username ='$username'";
                    mysqli_query($database, $query); ?>
                    <h1>New personal record!</h1>
                <?php } ?>

                <div class="block-text">
                    <h2>Your final score is: $<?= $_SESSION['score']?>!</h2>
                    <a href="leaderboard.php">Click here to see the leaderboard!</a>
                    <p><a href="logout.php">Log out here!</a></p>
                </div>
            <?php } else {
                //if session score is not set (i.e. the session has just started), sets the score at 0
                if(!isset($_SESSION['score'])){
                    $_SESSION['score'] = 0;
                }
            ?>
            <div class="user-heading">
                <h2>PLAYER:&nbsp&nbsp<?= $_SESSION['username']?></h2>
                <h2>SCORE:&nbsp&nbsp$<?= $_SESSION['score']?></h2>
            </div>
            <h1 class="gameboard-heading">Jeopardy!</h1>
            <table class="jepTable">
                <tr>
                    <th><button class="category">HOT DRINKS!</button></th>
                    <th><button class="category">SCI-FI</button></th>
                    <th><button class="category">WORLD GEOGRAPHY</button></th>
                    <th><button class="category">ANIMALS</button></th>
                    <th><button class="category">MUSIC</button></th>
                </tr>
                <form class="gameboard" action="question_answer.php" method="get">
                <tr>
                    <td><?php rightWrong('q1',1,200); ?>
                    <td><?php rightWrong('q6',6,200); ?>
                    <td><?php rightWrong('q11',11,200); ?>
                    <td><?php rightWrong('q16',16,200); ?>
                    <td><?php rightWrong('q21',21,200); ?>
                </tr>
                <tr>
                    <td><?php rightWrong('q2',2,400); ?>
                    <td><?php rightWrong('q7',7,400); ?>
                    <td><?php rightWrong('q12',12,400); ?>
                    <td><?php rightWrong('q17',17,400); ?>
                    <td><?php rightWrong('q22',22,400); ?>
                </tr>
                <tr>
                    <td><?php rightWrong('q3',3,600); ?>
                    <td><?php rightWrong('q8',8,600); ?>
                    <td><?php rightWrong('q13',13,600); ?>
                    <td><?php rightWrong('q18',18,600); ?>
                    <td><?php rightWrong('q23',23,600); ?>
                </tr>
                <tr>
                    <td><?php rightWrong('q4',4,800); ?>
                    <td><?php rightWrong('q9',9,800); ?>
                    <td><?php rightWrong('q14',14,800); ?>
                    <td><?php rightWrong('q19',19,800); ?>
                    <td><?php rightWrong('q24',24,800); ?>
                </tr>
                <tr>
                    <td><?php rightWrong('q5',5,1000); ?>
                    <td><?php rightWrong('q10',10,1000); ?>
                    <td><?php rightWrong('q15',15,1000); ?>
                    <td><?php rightWrong('q20',20,1000); ?>
                    <td><?php rightWrong('q25',25,1000); ?>
                </tr>
                </form>
            </table>
        <?php
        }
    }
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
