<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<style>
    #betterFont {
        font-family: "Google Sans", Roboto, Helvetica, Arial, sans-serif;
    }
</style>

<?php
if (isset($_POST["kcal"])) {
    $indicator = $_POST["kcal"];
    switch ($indicator) {
        case $indicator === "kcal":
            view();
    }
} elseif (isset($_POST["ID"])){
    $ID = $_POST["ID"];
    echo $ID;
    delete($ID);
}
// functions:

function insert($name, $kcal)
{
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    if ($conn) {
        $sql = "INSERT INTO food (Name, Kcal) VALUES ('$name', '$kcal')";
        $result = $conn->query($sql);
        if ($result) {
            echo "Added";
        } else {
            echo "not added";
        }
    }

}

function delete($ID)
{
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    if ($conn){
        $sql = "DELETE FROM food.daily WHERE ID='$ID'";
        $result = $conn->query($sql);
        if ($result){
            echo "deleted";
        }
    }
}


function view()
{
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    if ($conn) {
        $sql = "SELECT * FROM food.food";
        $result = $conn->query($sql);
        ?>
            <div class="right" id="loading">



            </div>
        <table class="table" id="betterFont">
            <tr>
                <div class="display-4">Daily Intake</div>
            </tr>
            <tr>
                <td>Add</td>
                <td>Name</td>
                <td>Kcal</td>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    echo "<form>";
                    echo "<tr id='postID'>";
                    echo "<td class= 'postID' getID = '" . $rows["ID"] . "'><button class='btn'>+</button></td>";
                    echo "<td>" . $rows["Name"] . "</td>";
                    echo "<td>" . $rows["Kcal"] . "</td>";
                    echo "</tr>";
                    echo "</form>";
                }
            } ?>
        </table>
        <?php
    }
}


function checkDaily()
{
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    $sql = "SELECT * FROM daily";
    $result = $conn->query($sql);
    if ($result->num_rows>0){
        return true;
    }
}
