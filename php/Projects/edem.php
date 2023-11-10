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
<h1>Edit Employee</h1>
<form action="edem.php" method="post">
    Who do you want to edit? <br><br> First name: <input type="text" name="Feditee"> <br>
    Last name: <input type="text" name="Leditee"> <br>
    <?php
    ?>
    Edit the First Name: <input type="text" name="fname"> <br>
    Edit the Second Name: <input type="text" name="lname"><br>
    Edit the Hire Date: <input type="date" name="hdate"><br> <br>
    <input type="submit" name="submit">
</form>
<?php
$hostname = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "wooo";
$connection = mysqli_connect($hostname, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    if (isset($_POST["Feditee"], $_POST["Leditee"])) {
        $Fname = $_POST["fname"];
        $Lname = $_POST["lname"];
        $hDate = $_POST["hdate"];


        $quereplace = "INSERT INTO employeeinfo_1(first_name, last_name, hire_date) VALUES('$Fname', '$Lname', '$hDate')";

        $query = "SELECT * FROM wooo.employeeinfo_1 WHERE first_name = '$Fname'";
        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) >= 0) {
            $rows = mysqli_fetch_assoc($result);

            // turn the previous column/row values into variables

            $pName = "";
            $pLname = "";
            $pHdate = "";
            $pEmpId = "";

            $rows["first_name"] = $pName;
            $rows["last_name"] = $pLname;
            $rows["hire_date"] = $pHdate;
            $rows["employee_id"] = $pEmpId;

            $delQuery = "DELETE FROM employeeinfo_1 WHERE first_name = '$Fname'"; // DELETE FROM employeeinfo_1 WHERE last_name = lname; DELETE FROM emyployeeinfo_1 "

            if (mysqli_query($connection, $delQuery)) {
                // success

                $deleteMore = "DELETE FROM employeeinfo_1 WHERE first_name = '$pName'  AND last_name = '$pLname' AND employee_id = '$pEmpId'";

                if (mysqli_query($connection, $deleteMore)) {

                    if (mysqli_query($connection, $quereplace)) {
                        $Feditee = $_POST["Feditee"];
                        $Leditee = $_POST["Leditee"];
                        $sql = "DELETE FROM employeeinfo_1 WHERE first_name = '$Feditee' AND last_name =  '$Leditee' "; // check if it deletes the right thing if theres a duplicate
                        if (mysqli_query($connection, $sql)) {
                            echo "Success! Old info deleted. Overwritten" . "<br>";
                        }
                    }

                } else{
                    echo "Cant delete more.";
                }

            } else {
                echo "Nah again";
            }// now checking for duplicates

        } else {
            echo "Error. Enter Name";
        }
    }
}
?>

<?php
$allFirstNames = "SELECT * FROM wooo.employeeinfo_1 ORDER BY first_name ASC";
$queryResult = mysqli_query($connection, $allFirstNames);
if($queryResult->num_rows > 0) {
    $row = $queryResult->fetch_assoc();
    echo "First name: " . $row["first_name"] . "<br>";
    echo "Last name: " . $row["last_name"] . "<br> <br>";
    while ($row = $queryResult->fetch_assoc()) {
        echo "First name: " . $row["first_name"] . "<br>";
        echo "Last name: " . $row["last_name"] . "<br> <br>";

    }
}
?>

<button><a href="try123.php">Back home</a></button>
</body>
</html>
<?php
// Next make a login page and then make it possible to order by with a button
?>