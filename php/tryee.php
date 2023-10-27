<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="tryee.php" method="get">
    What employees info would you like to see?: <input type="text" name="info">
    <input type="submit" name="submit" value="submit">

</form>

<?php

$hostname = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "wooo";

$connection = \mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$info = "";
if (isset($_GET["submit"])) {
    $info = $_GET["info"];
    if (!preg_match('/^[A-Za-z]+$/', $info)) {
        echo "Error: The input is not valid text.";
    } else {
        $info = $_GET["info"];
        if (isset($info)) {
            echo "Loading";
            if($info == "#####"){

            }
        }
    }

}
?>
</body>
</html>

