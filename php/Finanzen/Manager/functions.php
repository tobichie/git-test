<?php

$conn = mysqli_connect("localhost", "root", "Minecraft1", "finanzen");
if (!$conn) {
    echo "Couldn't connect";
} else {
    function view($conn)
    {
        echo "<table style='border: 1px solid black; position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%);'>";
        ?>
            <tr>
                <td>Title</td>
                <td>Time</td>
                <td>Amount</td>
            </tr>
        <?php
        // show the entries in the database
        $sql = "SELECT * FROM finanzen.finanz";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                // inside of the table
                echo "<tr getID='" . $rows["ID"] . "'>";
                echo "<td>" . $rows["Title"] . "</td>";
                echo "<td>" . $rows["Time"] . "</td>";
                echo "<td>" . $rows["Amount"] . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";

    }

    view($conn);

}
