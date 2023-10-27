

<?php

phpinfo();
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
    if (!preg_match('/^[\p{L}\s]+$/', $info)) {
        $error = "Error: The input is not valid text.";
        $info = "";
    } else {
        $info = $_GET["info"];
        if (isset($info)) {
            $status = "Loading";
            if($info == "#####"){

            }
        }
    }

}
?>


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
    What employees info would you like to see?: <input type="text" name="info" value=<?php echo $info ?>>
   ssssssssssss <input type="submit" name="submit" value="submit">

</form>
<?php
if (isset($status)){
    echo $status;
}
if (isset($error)){
    echo $error;
}
?>
</body>
</html>