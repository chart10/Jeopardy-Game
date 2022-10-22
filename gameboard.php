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
    <body>
    <?php
    //if session username not set, direct user to log in
    if(!isset($_SESSION['username'])){
        ?>
        <h1>You are not logged in. <a href="login.php">Log in</a> or <a href="registration.php">register</a> to play!</h1>
    <?php
    }
    else{
        if($_SESSION['q1'] && $_SESSION['q2']==1 && $_SESSION['q3']==1 && $_SESSION['q4']==1 && $_SESSION['q5']==1
            && $_SESSION['q6']==1 && $_SESSION['q7']==1 && $_SESSION['q8']==1 && $_SESSION['q9']==1 && $_SESSION['q10']==1
            && $_SESSION['q11']==1 && $_SESSION['q12']==1 && $_SESSION['q13']==1 && $_SESSION['q14']==1 && $_SESSION['q15']==1
            && $_SESSION['q16']==1 && $_SESSION['q17']==1 && $_SESSION['q18']==1 && $_SESSION['q19']==1 && $_SESSION['q20']==1
            && $_SESSION['q21']==1 && $_SESSION['q22']==1 && $_SESSION['q23']==1 && $_SESSION['q24']==1 && $_SESSION['q25']==1) {
            //if all questions have been answered, show final score and link to leaderboard
            //and store the user's score in the database if it is better than their previous top score

            //connect to database
            $database = mysqli_connect('localhost', 'root', '', 'users');
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
            <h1>Your final score is: $<?= $_SESSION['score']?>!</h1>
            <a href="leaderboard.php">Click here to see the leaderboard!</a>
            <p><a href="logout.php">Log out here!</a></p>
        <?php

        }
        else{
            //if session score is not set (i.e. the session has just started), sets the score at 0
            if(!isset($_SESSION['score'])){
                $_SESSION['score'] = 0;
            }
        ?>
            <h2>Username: <?= $_SESSION['username']?></h2>
            <h2>Current score: $<?= $_SESSION['score']?></h2>
            <table class="jepButton">
                <caption>Jeopardy Game!</caption>
                <tr>
                    <th>Hot Drinks!</th>
                    <th>Sci-fi</th>
                    <th>World Geography</th>
                    <th>Animals</th>
                    <th>Music</th>
                </tr>
                <form action="question_answer.php" method="get">
                <tr>
                    <td><button type="submit" name="qnum" value="1"
                        <?php if($_SESSION['q1'] == 1){ ?> disabled <?php } ?>
                        >$200</button></td>
                    <td><button type="submit" name="qnum" value="6"
                            <?php if($_SESSION['q6'] == 1){ ?> disabled <?php } ?>
                        >$200</button></td>
                    <td><button type="submit" name="qnum" value="11"
                            <?php if($_SESSION['q11'] == 1){ ?> disabled <?php } ?>
                        >$200</button></td>
                    <td><button type="submit" name="qnum" value="16"
                            <?php if($_SESSION['q16'] == 1){ ?> disabled <?php } ?>
                        >$200</button></td>
                    <td><button type="submit" name="qnum" value="21"
                            <?php if($_SESSION['q21'] == 1){ ?> disabled <?php } ?>
                        >$200</button></td>
                </tr>
                <tr>
                    <td><button type="submit" name="qnum" value="2"
                            <?php if($_SESSION['q2'] == 1){ ?> disabled <?php } ?>
                        >$400</button></td>
                    <td><button type="submit" name="qnum" value="7"
                            <?php if($_SESSION['q7'] == 1){ ?> disabled <?php } ?>
                        >$400</button></td>
                    <td><button type="submit" name="qnum" value="12"
                            <?php if($_SESSION['q12'] == 1){ ?> disabled <?php } ?>
                        >$400</button></td>
                    <td><button type="submit" name="qnum" value="17"
                            <?php if($_SESSION['q17'] == 1){ ?> disabled <?php } ?>
                        >$400</button></td>
                    <td><button type="submit" name="qnum" value="22"
                            <?php if($_SESSION['q22'] == 1){ ?> disabled <?php } ?>
                        >$400</button></td>
                </tr>
                <tr>
                    <td><button type="submit" name="qnum" value="3"
                            <?php if($_SESSION['q3'] == 1){ ?> disabled <?php } ?>
                        >$600</button></td>
                    <td><button type="submit" name="qnum" value="8"
                            <?php if($_SESSION['q8'] == 1){ ?> disabled <?php } ?>
                        >$600</button></td>
                    <td><button type="submit" name="qnum" value="13"
                            <?php if($_SESSION['q13'] == 1){ ?> disabled <?php } ?>
                        >$600</button></td>
                    <td><button type="submit" name="qnum" value="18"
                            <?php if($_SESSION['q18'] == 1){ ?> disabled <?php } ?>
                        >$600</button></td>
                    <td><button type="submit" name="qnum" value="23"
                            <?php if($_SESSION['q23'] == 1){ ?> disabled <?php } ?>
                        >$600</button></td>
                </tr>
                <tr>
                    <td><button type="submit" name="qnum" value="4"
                            <?php if($_SESSION['q4'] == 1){ ?> disabled <?php } ?>
                        >$800</button></td>
                    <td><button type="submit" name="qnum" value="9"
                            <?php if($_SESSION['q9'] == 1){ ?> disabled <?php } ?>
                        >$800</button></td>
                    <td><button type="submit" name="qnum" value="14"
                            <?php if($_SESSION['q14'] == 1){ ?> disabled <?php } ?>
                        >$800</button></td>
                    <td><button type="submit" name="qnum" value="19"
                            <?php if($_SESSION['q19'] == 1){ ?> disabled <?php } ?>
                        >$800</button></td>
                    <td><button type="submit" name="qnum" value="24"
                            <?php if($_SESSION['q24'] == 1){ ?> disabled <?php } ?>
                        >$800</button></td>
                </tr>
                <tr>
                    <td><button type="submit" name="qnum" value="5"
                            <?php if($_SESSION['q5'] == 1){ ?> disabled <?php } ?>
                        >$1000</button></td>
                    <td><button type="submit" name="qnum" value="10"
                            <?php if($_SESSION['q10'] == 1){ ?> disabled <?php } ?>
                        >$1000</button></td>
                    <td><button type="submit" name="qnum" value="15"
                            <?php if($_SESSION['q15'] == 1){ ?> disabled <?php } ?>
                        >$1000</button></td>
                    <td><button type="submit" name="qnum" value="20"
                            <?php if($_SESSION['q20'] == 1){ ?> disabled <?php } ?>
                        >$1000</button></td>
                    <td><button type="submit" name="qnum" value="25"
                            <?php if($_SESSION['q25'] == 1){ ?> disabled <?php } ?>
                        >$1000</button></td>
                </tr>
                </form>
            </table>
            <p><a href="logout.php">Log out here!</a></p>
        <?php
        }
    }
    ?>
    </body>
</html>