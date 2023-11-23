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
<form action="Tabelle.php" method="post">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-color: black;
        }
        th, td {
            border: 1px solid lightgrey;
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
<table>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Password</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
<?php
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





?>
</table>
</form>
</body>
</html>

