<?php
session_start();
$dataImp=$_POST["answers"]; //receive data in format (user answer),(correct answer),(question value)
$answer=explode(",",$dataImp);
$corAnswer=$answer[1];
$value=$answer[2];
if($answer[0]==$corAnswer){
    echo"You got it right! $$value added too your score!";
    $_SESSION['score'] = $_SESSION['score'] + $value; //add to score
}
else{
    echo"You got it wrong!";
}
echo"";
$qnum = $answer[3]; //this is the question number

switch($qnum){ //marks the answered question as answered
    case 1:
        $_SESSION['q1'] = 1;
        break;
    case 2:
        $_SESSION['q2'] = 1;
        break;
    case 3:
        $_SESSION['q3'] = 1;
        break;
    case 4:
        $_SESSION['q4'] = 1;
        break;
    case 5:
        $_SESSION['q5'] = 1;
        break;
    case 6:
        $_SESSION['q6'] = 1;
        break;
    case 7:
        $_SESSION['q7'] = 1;
        break;
    case 8:
        $_SESSION['q8'] = 1;
        break;
    case 9:
        $_SESSION['q9'] = 1;
        break;
    case 10:
        $_SESSION['q10'] = 1;
        break;
    case 11:
        $_SESSION['q11'] = 1;
        break;
    case 12:
        $_SESSION['q12'] = 1;
        break;
    case 13:
        $_SESSION['q13'] = 1;
        break;
    case 14:
        $_SESSION['q14'] = 1;
        break;
    case 15:
        $_SESSION['q15'] = 1;
        break;
    case 16:
        $_SESSION['q16'] = 1;
        break;
    case 17:
        $_SESSION['q17'] = 1;
        break;
    case 18:
        $_SESSION['q18'] = 1;
        break;
    case 19:
        $_SESSION['q19'] = 1;
        break;
    case 20:
        $_SESSION['q20'] = 1;
        break;
    case 21:
        $_SESSION['q21'] = 1;
        break;
    case 22:
        $_SESSION['q22'] = 1;
        break;
    case 23:
        $_SESSION['q23'] = 1;
        break;
    case 24:
        $_SESSION['q24'] = 1;
        break;
    case 25:
        $_SESSION['q25'] = 1;
        break;
}
header('Refresh: 1; URL = gameboard.php');
