<script>

    $(document).ready(function () {
        $("#briv").click(function () {
            $("#loadhere").load("openedit.php")
        })
    });


</script>

<div id="loadhere">
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
            echo "<br>";
        }
    }
    ?>
</div>
