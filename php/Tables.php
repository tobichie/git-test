<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table with database</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-color: aquamarine;
        }

        th, td {
            border: 1px solid #e3f4ff;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr {
            flex-direction: row;
            background-color: lightgrey;
        }
    </style>
</head>
<body>
<form method="post">
<table>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Password</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
</body>
</html>
<?php
$button = "";
$host = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "tabellen";
$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// start by selecting the content in order to modify it
$sql = "SELECT id, User, password from userinfo";

$result = $conn->query($sql);
print_r($_POST);

// use id

// $query = "DELETE * FROM userinfo WHERE id='$id'";



if ($result->num_rows > 0) { // it needs at least one row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td> <input type='text' name='newname' value='".$row["User"]."'> </td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td><button name='d' value='" . $row["id"] . "'>Delete</button></td>";
        echo "<td><button name='pressed' value'".$row["id"] . "'>Edit</button></td>";
        echo "</tr>";
        if (isset($_POST["pressed"])) {
            $button = $row["id"];
            echo "<form> <input type='text' name='newuser'> ";
            echo "<input type='submit' name='submit'></form>";
            if (isset($_POST["submit"])){
                if (isset($_POST["newuser"])) {
                    $newuser = $_POST["newuser"];
                    $newquery = "DELETE * FROM userinfo SET User='$newuser' WHERE id=$button";
                }
            }

        }


    }
    if (isset($_POST["d"])) {
        echo "Delete the following ID: <input type='text' name='delid' value='".$row["id"]."'> <input type='submit' name='delthis'><br>";
        if (isset($_POST["delthis"])) {
            $id = $_POST["delid"];
            $query = "DELETE FROM userinfo WHERE id='$id'";
            $querysult = $conn->query($query);
            if ($querysult) {
                echo "Deleted";

            } else {
                echo "Nope";
            }
        }
    }
} else {
    echo "0 results ";
}
echo "</table> </form>";

?>
