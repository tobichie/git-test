<!doctype html>
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
    <table class="highlight">
        <tr>
            <td>Id</td>
            <td>User</td>
            <td>Password</td>
            <td>Delete</td>
            <td>Edit</td>
            <td><button type='submit' name='add' value='" . $row["id"] . "'>Add</button></td>";
        </tr>
        <?php
        // make table ###
        // Connect to database
        //Prepare queries

        $insQuery = "SELECT id, User, password FROM userinfo WHERE id=''";


        $conn = mysqli_connect("localhost", "root", "Minecraft1", "tabellen");





        if ($conn->connect_error) {
            die("Connection failed");
        }

        // Add regeln

        if (isset($_POST["add"])){

        }

        // delete regeln

        if (isset($_POST["butt"])) {
            $butt = $_POST["butt"];
            // $id = "SELECT id FROM userinfo WHERE id='$butt'";
            // echo $id;
            $delQuery = "DELETE FROM userinfo WHERE id='$butt'";
            $newuser = $_POST["subuser"];
            $newpass = $_POST["subpass"];
            $delResult = $conn->query($delQuery);

            //if ($delResult->num_rows > 0) {
            //   echo "deleted";
            //}


        }


        // Now the same with insert
        /**
         * @param $submitedit
         * @param mysqli $conn
         * @return array|false|null
         */
        function getEdit($submitedit, mysqli $conn)
        {
            $fetchSql = "SELECT id, User, password FROM userinfo WHERE id='$submitedit'";
            $fetchResult = $conn->query($fetchSql);
            $row = $fetchResult->fetch_assoc();
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td><input type='text' name='newUser' value='" . $row["User"] . "'></td>";
            echo "<td><input type='text' name='newPassword' value='" . $row["password"] . "'></td>";
            echo "<td><button type='submit' name='update' value='" . $submitedit . "'>Update</button></td>";
            echo "</tr>";
            return $row;
        }

        if (isset($_POST["submitedit"])) {
            $submitedit = $_POST["submitedit"];
            $row = getEdit($submitedit, $conn);
        }
        update($conn);

        // display everything
        $sql = "SELECT id, User, password FROM userinfo";
        $result = $conn->query($sql);


        /**
         * @param mysqli $conn
         * @return void
         */
        function update(mysqli $conn)
        {
            if (isset($_POST['update'])) {
                $updateId = $_POST['update'];
                $newUser = $_POST['newUser'];
                $newPassword = $_POST['newPassword'];
                $updateSql = "UPDATE userinfo SET User='$newUser', password='$newPassword' WHERE id='$updateId'";
                $updateResult = $conn->query($updateSql);
                if ($updateResult) {
                    echo "UPDATED!";
                }
            }
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                // echo "<td>"
                echo "<td><button type='' name='böbö'>" . $row["id"] . "</button</td>";
                echo "<td> <input type='text' name='subuser' value=' " . $row["User"] . "'></td>";
                echo "<td><input type='text' name='subpass'  value='" . $row["password"] . "'></td>";
                echo "<td><button type='submit' name='butt' value='" . $row['id'] . "'>Delete</button></td>";
                echo "<td> <button type='submit' name='submitedit' value='" . $row["id"] . "'>Edit</button></td>";
                echo "</tr>";
                if (isset($_POST["böbö"])) {
                    $id = $row["id"];
                }
            }

        }
        // Handle delete button
        // Handle edit button
        // Close table
        echo "</table>";
        echo "</form>";
        ?>
</body>
</html>
