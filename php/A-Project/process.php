<?php
if (isset($_POST["ID"])) {
    echo "ID received <br>";
    $ID = $_POST["ID"];
    echo $ID;
    // add to daily the Name and Kcal found at the given ID

    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    if ($conn) {
        // first get the Name and Kcal and make variables with them
        $sql = "SELECT Name, Kcal FROM food.food WHERE ID='" . $ID . "'";
        echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row["Name"];
            $kcal = $row["Kcal"];
            echo $kcal;
            echo $name;
            // next insert
            if ($name && $kcal >= 0) {
                $sql = "INSERT INTO food.daily (Name, Kcal) VALUES ('$name', '$kcal')";
                echo $sql;
                $result = $conn->query($sql);
                mysqli_query($this->mysqli, "SET NAMES 'utf8'");
                if ($result) {
                    echo "Inserted";
                }
            }
        }
    }
}
