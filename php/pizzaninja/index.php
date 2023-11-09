<?php
$hostname = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "wooo";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn){
    echo "Connection error: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>

<?php include("header.php"); ?>

<?php include("footer.php"); ?>

</html>
