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
<?php

?>
<form action="editempinfo.php" method="post">
    Who would you like to delete?: <input type="text" name="gfn" value="">
    <input type="submit" name="submit">
</form>

<?php // $gfn = "" ?>
<div><br>Optional names: <br><br><?php


    $hostname = "localhost";
    $username = "root";
    $password = "Minecraft1";
    $database = "wooo";
    $connection = mysqli_connect($hostname, $username, $password, $database);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());

    }
    $allFirstNames = "SELECT * FROM wooo.employeeinfo_1  ";
    $queryResult = mysqli_query($connection, $allFirstNames);
    if ($queryResult->num_rows > 0) {
        $row = $queryResult->fetch_assoc();
        echo "First name: " . $row["first_name"] . "<br>";
        while ($row = $queryResult->fetch_assoc()) {
            echo "First name: " . $row["first_name"] . "<br>";
        }
    }
    if (isset($_POST["submit"])) {
        $gfn = $_POST["gfn"];
        if (isset($_POST["gfn"])) {
            $sql = "DELETE FROM employeeinfo_1 WHERE first_name = '$gfn' ";


            if (mysqli_query($connection, $sql)) {
                // success
                header('Location: try123.php');
            }
        } else {
            echo " <br> Enter the name";
        }
    }
    ?></div>
<br>
<button><a href="try123.php">Go back Home</a></button>
</body>
</html>

<?php


