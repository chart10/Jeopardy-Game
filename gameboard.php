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
        <table class="jepButton">
            <caption>Jepordy Game!</caption>
            <tr>
                <th>Hot Drinks!</th>
                <th>Sci-fi</th>
                <th>World Geography</th>
                <th>Animals</th>
                <th>Music</th>
            </tr>
            <form action="question_answer.php" method="post">
            <tr>
                <td><input type="button" name="101button" value="$100"/></td>
                <td><input type="button" name="102button" value="$100"/></td>
                <td><input type="button" name="103button" value="$100"/></td>
                <td><input type="button" name="104button" value="$100"/></td>
                <td><input type="button" name="105button" value="$100"/></td>
            </tr>
            <tr>
                <td><input type="button" name="201button" value="$200"/></td>
                <td><input type="button" name="202button" value="$200"/></td>
                <td><input type="button" name="203button" value="$200"/></td>
                <td><input type="button" name="204button" value="$200"/></td>
                <td><input type="button" name="205button" value="$200"/></td>
            </tr>
            <tr>
                <td><input type="button" name="301button" value="$300"/></td>
                <td><input type="button" name="302button" value="$300"/></td>
                <td><input type="button" name="303button" value="$300"/></td>
                <td><input type="button" name="304button" value="$300"/></td>
                <td><input type="button" name="305button" value="$300"/></td>
            </tr>
            <tr>
                <td><input type="button" name="401button" value="$400"/></td>
                <td><input type="button" name="402button" value="$400"/></td>
                <td><input type="button" name="403button" value="$400"/></td>
                <td><input type="button" name="404button" value="$400"/></td>
                <td><input type="button" name="405button" value="$400"/></td>
            </tr>
            <tr>
                <td><input type="button" name="501button" value="$500"/></td>
                <td><input type="button" name="502button" value="$500"/></td>
                <td><input type="button" name="503button" value="$500"/></td>
                <td><input type="button" name="504button" value="$500"/></td>
                <td><input type="button" name="505button" value="$500"/></td>
            </tr>
            </form>
        </table>
    </body>
</html>