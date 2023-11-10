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
<h1 class="center">Add Employee</h1>
<form action="addemployee.php" method="get">
    Employee first_name: <input type="text" name="newemp"> <br>
    <br>
    Employee last_name: <input type="text" name="newlastname"><br> <br>
    Employee hire_date: <input type="date" name="newdate"><br>
    <br>
    <input type="submit" name="submit"><br>
    <br><button><a href="try123.php" target="_blank" rel="noreferrer noopener">Go back Home</a></button>
    <br>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "Minecraft1";
    $database = "wooo";
    $connection = mysqli_connect($hostname, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // $dateError = "";
    // $lastNameError = "";
    // $firstNameError = "";
    $currentDate = date("d-m-Y");
    if (isset($_GET["submit"])) {
        if (!isset($newlastname, $newemp, $newdate)) {
            $newemp = mysqli_real_escape_string($connection, $_GET["newemp"]);
            $newlastname = mysqli_real_escape_string($connection, $_GET["newlastname"]);
            $newdate = mysqli_real_escape_string($connection, $_GET["newdate"]);

            if (!preg_match('/^[\p{L}\s]+$/', $newemp)) {
                echo "First name invalid <br>";

            } elseif (!preg_match('/^[\p{L}\s]+$/', $newlastname)) {
                echo "Last name invalid <br>";
            } elseif (!$newdate) {
                echo "Date invalid <br>";
            } elseif (strtotime($currentDate) < strtotime($newdate)) {
                echo "Hire date can't be in the future <br>";
            } else {
                echo "New employee added: " . $newemp . " " . $newlastname . "<br>";
                echo "Hire Date: " . $newdate;
                $query = "INSERT INTO employeeinfo_1(first_name, last_name, hire_date) VALUES('$newemp', '$newlastname', '$newdate')";
                if(mysqli_query($connection, $query)){
                    // success
                    header('Location: try123.php');
                } // now checking for duplicates

                else {
                    echo 'query error: '. mysqli_error($connection);
                }
            }
            // echo employee and hire date once input was checked


        }
    }elseif (!isset($newlastname, $newemp, $newdate)) {
        $error = "All fields must be filled!";
        return $error;
    }
    ?>
</form>
</body>
</html>