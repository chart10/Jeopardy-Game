<!-- Christian Hart, Jamie Kouttu, Alex Diaz-->

<!-- This page should include the question and possible answers for a
particular box from gameboard.php
TODO: Display question corresponding to original box
TODO: Each answer should be a link that updates the original box to "right"/"wrong"
TODO: access to the question-answer page should be disabled from completed question boxes
-->
<?php
$row=0;
$col=0;
$x=2;
$y=2;
while($x<6){
    while($y<6){
        if(isset ($_GET["$x$y"])) {
            $row=$x;
            $col=$y;
        }
        $x=$x+1;
        $y=$y+1;
    }
}
echo $col, $row;
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
<body>

</body>
</html>