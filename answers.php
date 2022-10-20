<?php
session_start();
$dataImp=$_POST["answers"]; //receive data in format (user answer),(correct answer),(question value)
$answer=explode(",",$dataImp);
$corAnswer=$answer[1];
$value=$answer[2];
if($answer[0]==$corAnswer){
    echo"You got it right! $value added too your score!";
    $_SESSION['score'] = $_SESSION['score'] + $value; //add to score
}
else{
    echo"You got it wrong!";
}
echo"";
header('Refresh: 5; URL = gameboard.php');
