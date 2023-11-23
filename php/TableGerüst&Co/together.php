<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="center">
<form action="together.php" method="post">


    <?php
    // if (!isset($_POST["password"] )) {
    //     echo "<input type='password' name='password'>";
    //     echo "<input type='submit' name='submitpass'>";
    // }

    // if (isset($_POST["password"])){
    // $shoq = "";
    // if ($_POST["password"] == "MeinGott"){
    // if (isset($shoq)) {
    require "funktionen.php";
    require "HTMLTop.php";
    $conn = connect();


    if (isset($_POST["update"])) {
        update($conn);

    } elseif (isset($_REQUEST["delete"])) {

        delete($conn);

    } elseif (isset($_POST["add"])) {
        insert($conn);
        echo "<td></td>";
        echo "<td><input type='text' name='newUser'></td>";
        echo "<td><input type='text' name='newPassword'></td>";
        echo "<td><button type='submit' name='add'>Speichern</button></td>";

        // echo "<input type='submit' name='submit'>";

    } elseif (isset($_POST["copy"])) {
        copyIt($conn);
    }

    view($conn, (isset($_POST["edit"]) ? $_POST["edit"] : ''));
    // if (isset($_POST["edit"])){
    // edit($conn, $row = view($conn));
    // }
    //view($conn);
    // }
    // }
    // }

    // Soft delete
    // Neue Spalte
    // Null im normalzustand
    // Date
    ?>
</form>
</body>
</html>
