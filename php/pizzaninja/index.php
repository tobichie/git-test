<?php


$hostname = "localhost";
$username = "root";
$password = "Minecraft1";
$database = "tuts";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
}

// write query for all pizzas
$sql = 'SELECT title, ingredients, id, email FROM pizzas  ';

// get the result set (set of rows)
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the $result from memory (good practise)
mysqli_free_result($result);

// close connection
mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

<?php include('header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">

        <?php foreach($pizzas as $pizza): ?>

            <div class="col s6 m4">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul class="grey-text">
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="#">more info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php include('footer.php'); ?>

</html>