<!-- Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->

<!-- This page should include the question and possible answers for a
particular box from gameboard.php -->

<?php
session_start();
$quesNum=""; $value=""; $answer=""; $question="";
$a1=""; $a2=""; $a3=""; $a4="";

function printQnA(){
    $qnum=$_GET["qnum"];
    $data = fopen("question_answer.txt", 'r');
    $found=false;
    if($line=fgets($data)){
        while($found!=true){
            $quest=explode("/",$line);
            if($qnum==$quest[0]){
                $found=true;
                $quesNum=$quest[0];
                $value=$quest[1];
                $answer=$quest[2];
                $question=$quest[3];
                $a1=$quest[4];
                $a2=$quest[5];
                $a3=$quest[6];
                $a4=$quest[7];
            }else{
                $line=fgets($data);
            }
        }
    }

    echo "<h2>$question</h2>";

    echo ("<form action='answers.php' method='post'>
            <ul style='list-style-type: none'>
                <li><input type='radio' name='answers' id='anws1' value='A,$answer,$value,$qnum'><label for='anws1'>$a1</label></li>
                <li><input type='radio' name='answers' id='anws2' value='B,$answer,$value,$qnum'><label for='anws2'>$a2</label></li>
                <li><input type='radio' name='answers' id='anws3' value='C,$answer,$value,$qnum'><label for='anws3'>$a3</label></li>
                <li><input type='radio' name='answers' id='anws4' value='D,$answer,$value,$qnum'><label for='anws4'>$a4</label></li>
                <li><button type='submit' name='sub'>Submit Final Answer</button></li>
            </ul>
        </form>");
    fclose($data);
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Jeopardy Question Page</title>
    </head>
    <body class="jepBoard">
        <div class="jepQuestion">
            <?=printQnA(); ?>
        </div>
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