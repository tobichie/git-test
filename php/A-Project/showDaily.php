


<?php
$conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
if ($conn) {
    calcTotal();
    $sql = "SELECT * FROM food.daily";
    $result = $conn->query($sql);
    ?>
        <div id="stats">

        </div>
    <div class="right" id="loading">
    </div>
    <div class="table">
    <table class="table black" id="betterFont"we>
        <tr>
            <div class="display-6">Daily Intake</div>
        </tr>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Kcal</td>
            <td>Delete</td>
        </tr>
        <br>
        <?php
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                echo "<form>";
                echo "<tr id='postID'>";
                echo "<td>" . $rows["ID"] . "</td>";
                echo "<td>" . $rows["Name"] . "</td>";
                echo "<td>" . $rows["Kcal"] . "</td>";
                echo "<td class= 'delete' ><button getID = '" . $rows["ID"] . "' class='btn delete'>-</button></td>";
                echo "</tr>";
                echo "</form>";

            }
        } ?>
    </table>
    </div>
    <?php
}
function calcTotal()
{
    // make an array to save them all in
    if (!isset($total)) {
        $allValues[] = array();
        $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
        if ($conn) {
            $sql = "SELECT * FROM food.daily";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    $allValues[] = $rows["Kcal"];
                }

            }
            $total = array_sum($allValues);
            echo "<div class='display-5 total' style='background: lightgrey' > Total Kcalories Today: " . $total . "</div>";
        }
    } else {
        echo "";
    }
    return;
}