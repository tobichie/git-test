<?php

$hostname = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "tuts";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
}
?>

