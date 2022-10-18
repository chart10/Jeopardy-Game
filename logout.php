<!--Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->
<?php
session_start();
echo "Logging you out, " . $_SESSION["username"] . "! <br/>";

unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo "You have logged out!<br/>";
echo "<a href='login.php'>Return to login?</a>"
?>