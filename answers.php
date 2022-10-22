<?php
$dataImp=$_POST["answers"];
$answer=explode(",",$dataImp);
$data = fopen("question_answer.txt", 'r');
$found=false;
$corAnswer=0;
$value=0;
if($line=fgets($data)){
    while($found!=true){
        $quest=explode("/",$line);
        if($answer[1]==$quest[0]){
            $found=true;
            $value=$quest[1];
            $corAnswer=$quest[2];
        }else{
            $line=fgets($data);
        }
    }
}
if($answer[1]==$corAnswer){
    echo"You got it right! $value added too your score!";
}
else{
    echo"You got it wrong!";
}
echo"";
