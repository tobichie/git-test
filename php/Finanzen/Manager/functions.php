<?php

$conn = mysqli_connect("localhost", "root", "Minecraft1", "finanzen");
if (!$conn) {
    echo "Couldn't connect";
} else {
    function view($conn)
    {
        // show the entries in the database
        $sql = "SELECT * FROM finanzen.finanz";
        $result = $conn->query($sql);
        if ($result->num_rows()>0){
            while ($rows = $result->fetch_assoc){
                echo "<div>" . $rows["Name"] . "</div>";
            }
        }

    }
    view($conn);

}
