<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
<form action="Table.php" method="post">
    <table>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php
        // Connect to Database
        $hostname = "localhost";
        $username = "root";
        $password = "Minecraft1";
        $database = "tabellen";
        $conn = mysqli_connect($hostname, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle delete button
        if (isset($_POST['delete'])) {
            $deleteId = $_POST['delete'];
            $delSql = "DELETE FROM userinfo WHERE id='$deleteId'";
            $delResult = $conn->query($delSql);
            if ($delResult) {
                echo "<div>DELETED!</div>";
            }
        }

        // Handle edit button
        if (isset($_POST['edit'])) {
            $editId = $_POST['edit'];
            // You need to fetch the existing data for the selected row before allowing the user to update it.
            $row = getEdit($editId, $conn);
        } else {
            // Display existing data in the table
            $sql = "SELECT id, User, password FROM userinfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["User"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td><button type='submit' name='delete' value='" . $row["id"] . "'>Delete</button></td>";
                    echo "<td><button type='submit' name='edit' value='" . $row["id"] . "'>Edit</button></td>";
                    echo "</tr>";
                }
            }
        }

        // Handle update button
        update($conn);

        // Close table and form
        echo "</table></form>";
        ?>
</body>
</html>
