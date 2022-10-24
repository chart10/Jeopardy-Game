<!-- Christian Hart, Jamie Kouttu, Alex Diaz -->

<!-- This is where we should include the code for the main page of an active game.
TODO: HTML table of all questions in a Jeopardy grid layout.
TODO: Design PHP logic that links each dollar value to a question_answer page
TODO: Page should replace dollar value with "right"/"wrong" based on user answer
TODO: User div that displays username and score at the bottom of the page (logout option too)
TODO: Button that resets the game for the user?
TODO: (OPTIONAL) Randomize a box as "Daily Double" that allows the user to wager money
TODO: Link to leaderboard
-->

<?php
session_start();

//initialize the session variables indicating whether each question has been answered at 0 at the start of the game
if(!isset($_SESSION['q1']))
    $_SESSION['q1'] = 0;
if(!isset($_SESSION['q2']))
    $_SESSION['q2'] = 0;
if(!isset($_SESSION['q3']))
    $_SESSION['q3'] = 0;
if(!isset($_SESSION['q4']))
    $_SESSION['q4'] = 0;
if(!isset($_SESSION['q5']))
    $_SESSION['q5'] = 0;
if(!isset($_SESSION['q6']))
    $_SESSION['q6'] = 0;
if(!isset($_SESSION['q7']))
    $_SESSION['q7'] = 0;
if(!isset($_SESSION['q8']))
    $_SESSION['q8'] = 0;
if(!isset($_SESSION['q9']))
    $_SESSION['q9'] = 0;
if(!isset($_SESSION['q10']))
    $_SESSION['q10'] = 0;
if(!isset($_SESSION['q11']))
    $_SESSION['q11'] = 0;
if(!isset($_SESSION['q12']))
    $_SESSION['q12'] = 0;
if(!isset($_SESSION['q13']))
    $_SESSION['q13'] = 0;
if(!isset($_SESSION['q14']))
    $_SESSION['q14'] = 0;
if(!isset($_SESSION['q15']))
    $_SESSION['q15'] = 0;
if(!isset($_SESSION['q16']))
    $_SESSION['q16'] = 0;
if(!isset($_SESSION['q17']))
    $_SESSION['q17'] = 0;
if(!isset($_SESSION['q18']))
    $_SESSION['q18'] = 0;
if(!isset($_SESSION['q19']))
    $_SESSION['q19'] = 0;
if(!isset($_SESSION['q20']))
    $_SESSION['q20'] = 0;
if(!isset($_SESSION['q21']))
    $_SESSION['q21'] = 0;
if(!isset($_SESSION['q22']))
    $_SESSION['q22'] = 0;
if(!isset($_SESSION['q23']))
    $_SESSION['q23'] = 0;
if(!isset($_SESSION['q24']))
    $_SESSION['q24'] = 0;
if(!isset($_SESSION['q25']))
    $_SESSION['q25'] = 0;

$wrong=false;
$correct=false;

// Need a function to run for each question which decides whether to display "right" or "wrong" if
// the question has been answered

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
    //if session username not set, direct user to log in
    if(!isset($_SESSION['username'])){
        ?>
        <div class="block-text">
            <h2>You are not logged in. <a href="login.php">Log in</a> or <a href="registration.php">register</a> to play!</h2>
        </div>
    <?php
    }
    else{
        if($_SESSION['q1']>0 && $_SESSION['q2']>0 && $_SESSION['q3']>0 && $_SESSION['q4']>0 && $_SESSION['q5']>0
            && $_SESSION['q6']>0 && $_SESSION['q7']>0 && $_SESSION['q8']>0 && $_SESSION['q9']>0 && $_SESSION['q10']>0
            && $_SESSION['q11']>0 && $_SESSION['q12']>0 && $_SESSION['q13']>0 && $_SESSION['q14']>0 && $_SESSION['q15']>0
            && $_SESSION['q16']>0 && $_SESSION['q17']>0 && $_SESSION['q18']>0 && $_SESSION['q19']>0 && $_SESSION['q20']>0
            && $_SESSION['q21']>0 && $_SESSION['q22']>0 && $_SESSION['q23']>0 && $_SESSION['q24']>0 && $_SESSION['q25']>0) {
            //if all questions have been answered, show final score and link to leaderboard
            //and store the user's score in the database if it is better than their previous top score

            //connect to database
            $database = mysqli_connect('localhost', 'root', 'root', 'users');
            //if there is an error connecting to the database, stop the script and display the error
            if (mysqli_connect_errno()) {
            // If there is an error with the connection, stop the script and display the error.
                exit('Failed to connect to MySQL: ' . mysqli_connect_error());
            }

            $username = $_SESSION['username'];
            $query = "SELECT * FROM users WHERE username='$username'";
            //query to find the row containing the username
            $result = mysqli_query($database, $query);
            $user = mysqli_fetch_assoc($result);

            if($user['topscore'] == null || $user['topscore'] < $_SESSION['score']){
                //if user has no top score, or their previous top score is less than their current score,
                //update the top score in the database
                $score = $_SESSION['score'];
                $query = "UPDATE users SET topscore = '$score' WHERE username ='$username'";
                mysqli_query($database, $query);
                echo "<h1>New personal record!</h1>";
            }

            ?>
            <div class="block-text">
                <h2>Your final score is: $<?= $_SESSION['score']?>!</h2>
                <a href="leaderboard.php">Click here to see the leaderboard!</a>
                <p><a href="logout.php">Log out here!</a></p>
            </div>
        <?php

        }
        else{
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
            <li><a href="login.php">Log In</a></li>
            <li><a href="registration.php">Register</a></li>
            <li><a href="gameboard.php">Game Board</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    </body>
</html>
<?php
    function rightWrong($qnum, $num, $value) {
        if($_SESSION[$qnum] == 0){ ?>
            <button class="jepButton" type="submit" name="qnum" value="<?php print($num) ?>">$<?php print($value) ?></button></td>
        <?php } else if($_SESSION[$qnum] == 1){ ?>
            <button class="correct" type="submit" name="<?php print($qnum) ?>" value="<?php print($num) ?>" disabled>RIGHT!</button></td>
        <?php } else if($_SESSION[$qnum] == 2){ ?>
            <button class="wrong" type="submit" name="<?php print($qnum) ?>" value="<?php print($num) ?>" disabled>WRONG!</button></td>
            <?php } ?>

    <?php }
?>