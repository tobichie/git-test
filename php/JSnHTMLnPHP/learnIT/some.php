<?php
$commentNewCount = $_POST["commentNewCount"];
$conn = mysqli_connect("localhost", "root", "Minecraft1", "Comments");
$sql = "SELECT * FROM Comments.kommentare LIMIT $commentNewCount";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='what'>";
        echo "<div class=''>" . $row["Name"] . ": </div>";
        echo "<div class=''>" . $row["Kommentar"] . "</div>";
        echo "</div>";
    }
} else {
    echo "Couldn't find anything in the Database";
}

?>
