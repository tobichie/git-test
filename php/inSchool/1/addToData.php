<head>
    <!-- cdns -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</head>

<?php
$getbyID = "";
// give the html a value with php, send it to this site with ajax and use it
if (isset($_POST["ID"])) {
    $ID = $_POST["ID"];
    echo "<div class = 'success'>" . $ID . " will be added to the database </div>";

    // get the name and kcal for the item with the given ID
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    $sql = "SELECT Name, Kcal FROM food.food WHERE ID= '$ID'";
    $result = $conn ->query($sql);
    if ($result->num_rows > 0) {
        $rows = $result->fetch_assoc();
        $Name = $rows["Name"];
        $Kcal = $rows["Kcal"];

        // now add it to the daily intake
        $sql = "INSERT INTO daily (Name, Kcal) VALUES ('$Name', '$Kcal') ";
        $result = $conn->query($sql);
        if ($result){
            // next show daily intake
        } else {
            echo "Didnt work";
        }
    } else {
        echo "Item doesnt exist";
    }

} else {
    echo "Didn't work. Name or kcal is not set.";
}

?>

