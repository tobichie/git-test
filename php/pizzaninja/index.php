<?php

include("config.php");

// write query for all pizzas

$sql = "SELECT title, ingredients, id FROM pizzas ORDER BY id";

// make query & get result

$result = mysqli_query($conn, $sql); // starts query for the database connected ($conn) and passes $sql, which contains what you want to query (What's selected)

// fetch the resulting rows as an array

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); //MYSQLI_ASSOC means its passed back as an associative array

// following 2 are not necessary

// free result from memory

mysqli_free_result($result);

// close connection

mysqli_close($conn);

// explode(",", $pizzas[0]["ingredients"]);

?>

<!DOCTYPE html>
<html>

<?php include("header.php"); ?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">

        <?php foreach($pizzas as $pizza):  ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza["title"]);?></h6> <?php // never trust the user?>
                        <ul>
                            <?php foreach(explode(",", $pizza["ingredients"]) as $ing){?>
                                <li><?php echo htmlspecialchars($ing) ?></li>


                            <?php }?>
                        </ul>
                    </div>
                    <div class="class-action right-align">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>

<?php include("footer.php"); ?>

</html>
