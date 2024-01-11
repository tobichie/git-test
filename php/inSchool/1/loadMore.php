<script>
    $(document).ready(function () {
        $("#refresh").click(function () {
            location.reload()
        })
    })
</script>
<div class="text-center media-middle" id="load">
    <?php

    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    $sql = "SELECT * FROM daily ORDER BY TIMESTAMP DESC";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 2) {
            ?>
            <div class="container" id="table">
                <h1 class="display-4">Daily Intake</h1>
                <?php
                echo "<table class='table'>";
                echo "<tr><th>Name</th><th>Kcal</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Kcal"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                ?>
                <div class="fixed-bottom">Refresh <span id="refresh">↻</span></div>
            </div>
            <?php
        } else {
            echo "<table class='table'>";
            echo "<tr><th>Name</th><th>Kcal</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Kcal"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "No more found";

            ?>

            <?php
        }
        ?>
        <?php
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();

    ?>
</div>