<style>
    bu
</style>
<div class="container center">
    <?php
    // make a connection
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "Power");

    if (!$conn) {
        echo "Couldnt connect";
    } else {
        // echo "Connected";
        // next show a button to show everything
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $id = $rows["ID"];
                echo $rows["name"];
                echo " ";
                echo $rows["ID"];
                echo "<form method='post' action='temp.php'>";
                echo "<input type='hidden' name='user_id' value='$id'>"; // Add this line
                echo "<button type='submit' class='btn wave' name='subhim'>Delete</button>";
                echo "<button type='submit' class='btn wave'>Copy</button>";
                echo "<br>";
                echo "</form>";
            }
        }

        echo "<div>";
        echo "<button class='btn blue-wave' type='button' name='add'>Add</button>";

    }
    ?>
</div>
