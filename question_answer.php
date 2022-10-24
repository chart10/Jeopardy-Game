<!-- Christian Hart, Jamie Kouttu, Alex Diaz-->

<!-- This page should include the question and possible answers for a
particular box from gameboard.php
TODO: Display question corresponding to original box
TODO: Each answer should be a link that updates the original box to "right"/"wrong"
TODO: access to the question-answer page should be disabled from completed question boxes!!
-->
<?php
session_start();
$quesNum="";
$value="";
$answer="";
$question="";
$a1="";
$a2="";
$a3="";
$a4="";

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
//    print ("the question is: $question");
//    echo "<br>$a1";
//    echo "<br>$a2";
//    echo "<br>$a3";
//    echo "<br>$a4";
    echo "<h2>$question</h2>";
    /*echo "<input type='radio' name='answers' id='anws1' value='a'><label for='anws1'>$a1</label>";
    echo "<input type='radio' name='answers' id='anws2' value='b'><label for='anws2'>$a2</label>";
    echo "<input type='radio' name='answers' id='anws3' value='c'><label for='anws3'>$a3</label>";
    echo "<input type='radio' name='answers' id='anws4' value='d'><label for='anws4'>$a4</label>";*/
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
<!--       <h2>$question</h2>-->
<!--    /* <form action="<  ?= $_SERVER['PHP_SELF'];?>" method="post">-->
<!--    <ul>-->
<!--        <li><input type="radio" name="answers" id="anws1" value="a"><label for="anws1">$a1</label></li>-->
<!--        <li><input type="radio" name="answers" id="anws2" value="b"><label for="anws2">$a2</label></li>-->
<!--        <li><input type="radio" name="answers" id="anws3" value="c"><label for="anws3">$a3</label></li>-->
<!--        <li><input type="radio" name="answers" id="anws4" value="d"><label for="anws4">$a4</label></li>-->
<!--    </ul>-->
<!--    <input type="button" name="sub" value="Find Answer!">-->
<!--    </form>-->
</div>
</body>
</html>