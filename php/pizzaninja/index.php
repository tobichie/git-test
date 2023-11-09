<?php
$hostname = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "tuts";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn){
    echo "Connection error: " . mysqli_connect_error();
}

// write query for all pizzas

$sql = "SELECT title, ingredients, id FROM pizzas ORDER BY id";

// make query & get result

$result = mysqli_query($conn, $sql); // starts query for the database connected ($conn) and passes $sql, which contains what you want to query (What's selected)

// fetch the resulting rows as an array

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); //MYSQLI_ASSOC means its passed back as an associative array

// free result from memory

mysqli_free_result($result);

// close connection

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<?php include("header.php"); ?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">

        <?php foreach($pizzas as $pizza){  ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza["title"])?></h6> <?php // never trust the user?>
                        <div><?php echo htmlspecialchars($pizza["ingredients"]) ?></div>
                    </div>
                    <div class="class-action right-align">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
</div>

<?php include("footer.php"); ?>

</html>
