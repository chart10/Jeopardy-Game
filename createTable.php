<?php
$database = mysqli_connect('localhost', 'jkouttu1', 'jkouttu1', 'jkouttu1');
//if there is an error connecting to the database, stop the script and display the error
if (mysqli_connect_errno()) {
// If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$query = "CREATE TABLE users (
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    topscore INT(11)
)";
$result = mysqli_query($database, $query);

echo $result;


