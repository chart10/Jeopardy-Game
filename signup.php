<!-- Christian Hart,  -->

<!-- This page should allow the user to create a new account
TODO: Design the backend for account creation/persistence
TODO: Create HTML form for signup
-->

<!DOCTYPE html>
<html lang="en-us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Jeopardy Sign-up</title>
    </head>
    <body>
    <?php
        setcookie("visited", true);
        if (isset($_COOKIE["visited"])): ?>
        <h1>Welcome Back!</h1>
    <?php else: ?>
        <h1>Please enter your info to sign up...</h1>
        <form action="signup-submit.php" method="post">
            <label for="message">Enter some text:</label>
                <input type="text" name="message">
            </label>
        </form>
    <?php endif ?>
    </body>
</html>