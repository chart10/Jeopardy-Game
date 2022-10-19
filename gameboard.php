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
            <form action="question_answer.php" method="get">
            <tr>
                <td><button type="submit" name="qnum" value="11">100</button></td>
                <td><button type="submit" name="qnum" value="12">100</button></td>
                <td><button type="submit" name="qnum" value="13">100</button></td>
                <td><button type="submit" name="qnum" value="14">100</button></td>
                <td><button type="submit" name="qnum" value="15">100</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="qnum" value="21">200</button></td>
                <td><button type="submit" name="qnum" value="22">200</button></td>
                <td><button type="submit" name="qnum" value="23">200</button></td>
                <td><button type="submit" name="qnum" value="24">200</button></td>
                <td><button type="submit" name="qnum" value="25">200</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="qnum" value="31">300</button></td>
                <td><button type="submit" name="qnum" value="32">300</button></td>
                <td><button type="submit" name="qnum" value="33">300</button></td>
                <td><button type="submit" name="qnum" value="34">300</button></td>
                <td><button type="submit" name="qnum" value="35">300</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="qnum" value="41">400</button></td>
                <td><button type="submit" name="qnum" value="42">400</button></td>
                <td><button type="submit" name="qnum" value="43">400</button></td>
                <td><button type="submit" name="qnum" value="44">400</button></td>
                <td><button type="submit" name="qnum" value="45">400</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="qnum" value="51">500</button></td>
                <td><button type="submit" name="qnum" value="52">500</button></td>
                <td><button type="submit" name="qnum" value="53">500</button></td>
                <td><button type="submit" name="qnum" value="54">500</button></td>
                <td><button type="submit" name="qnum" value="55">500</button></td>
            </tr>
            </form>
        </table>
    </body>
</html>