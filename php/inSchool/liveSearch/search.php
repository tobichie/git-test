<?php
// db conn

$conn = mysqli_connect("localhost", "root", "Minecraft1", "employee");

if (!$conn) {
    echo "couldnt connect to database";
} else {


    $sql = "SELECT * FROM employee.employees WHERE first_name LIKE '%" . $_POST["name"] . "%'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while (($row = mysqli_fetch_assoc($result))) {
            echo "<tr>
                    <td>" . $row['first_name'] . " </td >
                    <td>" . $row['last_name'] . " </td >
                    <td>" . $row['city'] . " </td >
                    <td>" . $row['salary'] . " </td >
                </tr> ";
    }
} else {



        $error = "0 Results";
        echo $error;
        echo "...";
    }

}