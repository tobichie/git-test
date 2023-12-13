<script>

    $(document).ready(function () {});


</script>

<?php

$conn = mysqli_connect("localhost", "root", "Minecraft1", "power");
if (!$conn){
    die("Couldn't connect");
}
$sql = "SELECT * FROM power.users ORDER BY name";
$result = $conn->query($sql);
if ($result -> num_rows > 0){
    while ($rows = $result->fetch_assoc()){
        echo "<div name='briv' id='briv'> ". $rows['name'] . "</div>";
        echo "<button class='delete btn'>Delete</button>";
        echo "<button class='edit btn blue-wave'>Edit</button>";
        echo "<br>";
    }
}
?>