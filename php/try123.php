<div class="hihi">
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
    if (!preg_match('/^[\p{L}\s]+$/', $info)) {
        $error = "Error: The input is not valid text.";
        $info = "";
    } else {
        $info = $_GET["info"];
        if (isset($info)) {
            // Perform a database query to fetch the employee information based on the provided first name
            $query = "SELECT * FROM wooo.employeeinfo_1 WHERE first_name = '$info'";
            $result = mysqli_query($connection, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Employee ID: " . $row["employee_id"] . "<br>";
                echo "First Name: " . $row["first_name"] . "<br>";
                echo "Last Name: " . $row["last_name"] . "<br>";
                echo "Hire Date: " . $row["hire_date"] . "<br>";
            } else {
                $error = "Employee not found in the database.";
            }
        }
    }

}
?>
</div>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="hihi.css">
</head>
<body>
<div class="hihi">
<form action="try123.php" method="get">
    What employees info would you like to see?: <input type="text" name="info" value=<?php echo $info ?>>
    <input type="submit" name="submit" value="submit">

</form>
</div>
<?php
if (isset($status)) {
    echo $status;
}
if (isset($error)) {
    echo $error;
}
?>
</body>
</html>