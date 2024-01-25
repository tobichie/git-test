<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "Minecraft1", "finanzen");
if (!$conn) {
echo "Couldn't connect";
} else {
// show last 10 transactions
// give option to make new row (add or deduckt money)
// either flat amounts or specific products
// give option to edit entry
    require "functions.php";
}
?>
</body>
</html>


