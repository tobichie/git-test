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
            margin: 10px;
            border-collapse: collapse;
            border: 10px;
        }

        body {
            background-color: #0a0734;
        }

        h1 {
            color: whitesmoke;
        }

        div {
            color: white;
        }
    </style>
</head>
<body>
<h1 class="center">Movies</h1>


<div class="container center input-field">
    <style> input {
            width: 100px;
            border-collapse: collapse;
            border: 8px black;
            margin-outside: 5px;
        }</style>
    <input type="search" name="search" class="search center" placeholder="Search">
</div>
<form action="index.php" method="post">
    <table class="container stripped">
        <tr>
            <th>Categorie</th>
            <th>Name</th>
            <th>Rating</th>
            <?php
            if (!isset($_POST["enablefilters"])) {
                echo "<th><button class='blue waves-effect waves-light btn' name='enablefilters'>Filter by</button></th>";
            } else {
                echo "<th>
                <button class='blue waves-effect waves-light btn' name='timeadded'>Time Added</button>
                <button class='blue waves-effect waves-light btn' name='Rating'>Rating</button>
                <button class='blue waves-effect waves-light btn' name='Length'>Length</button>
                <button class='blue waves-effect waves-light btn' name='Category'>Category</button></th>";

                // show them by time added


            }
            // dont forget to show every movie in the database that contains the word/s given through user input
            ?>
        </tr>
        <?php

        ?>
        <?php // making a connection to the database
        $conn = mysqli_connect("localhost", "root", "Minecraft1", "movies");
        if (!$conn) {
            echo "Error. Not connected to database";
        }
        ?>
        <?php
        // if filters arent set just show this, so if a certain filter wasnt pressed
        // otherwise show the filtered version

        if (!isset($_POST["enablefilters"])) {
            if (!isset($_POST["timeadded"]) and !isset($_POST["Rating"]) and !isset($_POST["Length"])) {
                $sql = "SELECT * FROM allmovies";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) {
                        $category = $rows["Categorie"];
                        $name = $rows["Name"];
                        $rating = $rows["Rating"];
                        ?>
                        <tr>
                            <td><a href="../TableGerüst&Co/together.php" rel="noopener noreferrer"
                                   target="_blank"><?php echo $rows["Categorie"] ?></a></td>
                            <td><?php echo $rows["Name"] ?></td>
                            <td><?php echo $rows["Rating"] ?></td>
                        </tr>
                    <?php } // creating the rows for Every movies Categore etc.?
                }
            }
        }
        if (isset($_POST["enablefilters"])) {
            if (!isset($_POST["timeadded"]) or !isset($_POST["Rating"]) or !isset($_POST["Length"])) {
                $sql = "SELECT * FROM allmovies ORDER BY NAME ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) {
                        $category = $rows["Categorie"];
                        $name = $rows["Name"];
                        $rating = $rows["Rating"];
                        ?>
                        <tr>
                            <td><a href="../TableGerüst&Co/together.php" rel="noopener noreferrer"
                                   target="_blank"><?php echo $rows["Categorie"] ?></a></td>
                            <td><?php echo $rows["Name"] ?></td>
                            <td><?php echo $rows["Rating"] ?></td>
                        </tr>


                        <?php
                    }
                }
            }
        } if (isset($_POST["timeadded"])) {
            // display by time added
            $sql = "SELECT * FROM allmovies ORDER BY TIMESTAMP DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    $category = $rows["Categorie"];
                    $name = $rows["Name"];
                    $rating = $rows["Rating"];
                    ?>
                    <tr>
                        <td><a href="../TableGerüst&Co/together.php" rel="noopener noreferrer"
                               target="_blank"><?php echo $rows["Categorie"] ?></a></td>
                        <td><?php echo $rows["Name"] ?></td>
                        <td><?php echo $rows["Rating"] ?></td>

                        <td><strong><i><?php echo $rows["Timestamp"] ?></i></strong></td>
                    </tr>
                    <?php
                }
            }
        }


        if (isset($_POST["Rating"])) {
            $sql = "SELECT * FROM allmovies WHERE Rating IS NOT NULL ORDER BY Rating DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><a href="../TableGerüst&Co/together.php" rel="noopener noreferrer"
                               target="_blank"><?php echo $rows["Categorie"] ?></a></td>
                        <td><?php echo $rows["Name"] ?></td>
                        <td><?php echo $rows["Rating"] ?></td>
                    </tr>
                    <?php
                }
            }
        }



        if (isset($_POST["Length"])) {
            $sql = "SELECT * FROM allmovies ORDER BY NAME ASC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    $category = $rows["Categorie"];
                    $name = $rows["Name"];
                    $rating = $rows["Rating"];
                    ?>
                    <tr>
                        <td><a href="../TableGerüst&Co/together.php" rel="noopener noreferrer"
                               target="_blank"><?php echo $rows["Category"] ?></a></td>
                        <td><?php echo $rows["Name"] ?></td>
                        <td><?php echo $rows["Rating"] ?></td>
                    </tr>
                    <?php
                }
            }
        } elseif (isset($_POST["Category"])) {
            echo "<div >What<div";
        }

        ?>


    </table>


    <?php
    // side column next
    ?>

    <!-- <button type="submit">Show Sidebar</button> -->
    <?php
    if (isset($_POST["filters"])) {
        ?>
        <div class="left">
            <a class="red waves-effect waves-light btn"><i
                        class="material-icons right">Extras </i></a>
        </div>
    <?php }
    if (!isset($_POST["filters"])) {


        ?>
        <div class="left">
            <a class="blue waves-effect waves-light btn"><i
                        class="material-icons right">Extras </i></a>
        </div>
        <?php
    }
    ?>
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