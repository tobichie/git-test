<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyVies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        table {
            background-color: grey;
            border: black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1 class="center">Movies</h1>


<div class="container center input-field">
    <style> input{
            width: 100px;
            border-collapse: collapse;
            border: 8px black;
            margin-outside: 5px;
        }</style>
    <input type="search" name="search" class="search center">
</div>
<form action="index.php" method="post">
<table class="container">
    <tr>
        <th>Categorie</th>
        <th>Name</th>
        <th>Ratings</th>
    </tr>
    <?php // making a connection to the database
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "movies");
    if (!$conn){
        echo "Error. Not connected to database";
    }
    ?>
    <?php

    $sql = "SELECT * FROM allmovies";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while ($rows = $result->fetch_assoc()){
            $category = $rows["Categorie"];
            $name = $rows["Name"];
            $rating = $rows["Rating"];
            ?>
                <tr>
                    <td><a href="../TableGerüst&Co/together.php" rel="noopener noreferrer" target="_blank"><?php echo $rows["Categorie"] ?></a></td>
                    <td><?php echo $rows["Name"] ?></td>
                    <td><?php echo $rows["Rating"] ?></td>
                </tr>
            <?php } // creating the rows for Every movies Categore etc.?

    }
?>




</table>
<?php
// side column next
?>

<!-- <button type="submit">Show Sidebar</button> -->

<div class="left">
    <a href="../TableGerüst&Co/together.php" target="_blank" rel="noopener noreferrer"><nav>GOTODAFILTER
    </nav> </a>
</div>
</form>
</body>
</html>
<?php
// The whole site where the latest added are shown
// A sidebar to click on to open filters

// Obere 'sidebar'

// Boxen die alle Filme anzeigen in verschiedenen Kategorien, links nach rechts

// First make the main site without sidebars, without php around it for a condition like the sidebars
?>

