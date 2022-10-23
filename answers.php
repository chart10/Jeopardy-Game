<?php
session_start();
$dataImp=$_POST["answers"]; //receive data in format (user answer),(correct answer),(question value)
$answer=explode(",",$dataImp);
$corAnswer=$answer[1];
$value=$answer[2];
$userInput = 0;
if($answer[0]==$corAnswer){
    echo"You got it right! $$value added too your score!";
    $_SESSION['score'] = $_SESSION['score'] + $value; //add to score!!!!!
    $userInput = 1;
}
else{
    echo "You got it wrong! $$value subtracted from your score!";
    $_SESSION['score'] = $_SESSION['score'] - $value;
    $userInput = 2;
}
echo"";
$qnum = $answer[3]; //this is the question number


switch($qnum){ //marks the answered question as answered
    case 1:
        $_SESSION['q1'] = $userInput;
        break;
    case 2:
        $_SESSION['q2'] = $userInput;
        break;
    case 3:
        $_SESSION['q3'] = $userInput;
        break;
    case 4:
        $_SESSION['q4'] = $userInput;
        break;
    case 5:
        $_SESSION['q5'] = $userInput;
        break;
    case 6:
        $_SESSION['q6'] = $userInput;
        break;
    case 7:
        $_SESSION['q7'] = $userInput;
        break;
    case 8:
        $_SESSION['q8'] = $userInput;
        break;
    case 9:
        $_SESSION['q9'] = $userInput;
        break;
    case 10:
        $_SESSION['q10'] = $userInput;
        break;
    case 11:
        $_SESSION['q11'] = $userInput;
        break;
    case 12:
        $_SESSION['q12'] = $userInput;
        break;
    case 13:
        $_SESSION['q13'] = $userInput;
        break;
    case 14:
        $_SESSION['q14'] = $userInput;
        break;
    case 15:
        $_SESSION['q15'] = $userInput;
        break;
    case 16:
        $_SESSION['q16'] = $userInput;
        break;
    case 17:
        $_SESSION['q17'] = $userInput;
        break;
    case 18:
        $_SESSION['q18'] = $userInput;
        break;
    case 19:
        $_SESSION['q19'] = $userInput;
        break;
    case 20:
        $_SESSION['q20'] = $userInput;
        break;
    case 21:
        $_SESSION['q21'] = $userInput;
        break;
    case 22:
        $_SESSION['q22'] = $userInput;
        break;
    case 23:
        $_SESSION['q23'] = $userInput;
        break;
    case 24:
        $_SESSION['q24'] = $userInput;
        break;
    case 25:
        $_SESSION['q25'] = $userInput;
        break;
}
header('Refresh: 1; URL = gameboard.php');
