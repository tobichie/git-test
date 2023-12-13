<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style>

    .boxit {
        height: 70vh;
        flex-direction: row;
        border-radius: 10px;
        border: black 1px solid;
        margin-inside: 5px;

    }


</style>
<body>
<?php

// Users, add and delete with buttons
// Converter
// text feld
// 1. Login field
// - Register a new user

?>
<script>

    $(document).ready(function () {
        $("#userCurrency").blur(function () {
            let myVariable = $("#userCurrency").val(); // Get the value of #userCurrency
            console.log(myVariable);
            $("#showHere").load("html.php", { myData: myVariable });
        });
    });


</script>



<div class="container input">
    <form action="index.php" method="post">
        <div>
            <input type="text" id="userCurrency" placeholder="Number to be converted">
        </div>
        <div>
            <input type="text" id="here" placeholder="Converted Number" readonly>
        </div>
    </form>
</div>
<div id="showHere">

</div>
</body>
</html>



<?php

