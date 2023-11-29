<?php
require connect();
$hostname = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "tabellen";
connect($hostname, $username, $password, $database);


$mysqli = new mysqli("example.com", "user", "password", "database");
$result = $mysqli->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
$row = $result->fetch_assoc();
echo htmlentities($row['_message']);

// get rows without while or anything
?>

