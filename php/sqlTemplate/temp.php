<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            $("#btn").click(function () {
                $("#primary").load("loadThis.php")

            })
        })
    </script>
</head>
<body>
<?php
if (isset($_POST["subhim"])) {
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "Power");

    echo "subbed";
    $userIdToDelete = $_POST["user_id"];
    echo $userIdToDelete;
    // delete it
    $sql = "DELETE FROM users WHERE ID = $userIdToDelete";
    $result = $conn->query($sql);


}
if (isset($_POST["subher"])) {
    echo "sebbed";
    $userIdToDelete = $_POST["user_id"];
    // copy it
}
if (isset($_POST["add"])){
    echo "added";
    $sql = "INSERT INTO power.users WHERE (name) VALUE ($name)";
}
?>
</body>
</html>

<button id="btn" name="btn" class="btn">btn</button>
<div id="primary"></div>
