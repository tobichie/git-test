<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <style>
        .darken {
            background-color: lightgrey;
            margin: auto;
            border-radius: 5px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#kcalCount").click(function () {
                console.log("AHHHH")
                // once ... is clicked load the kcal counter
                const isPressed = 1

                $("#loadHere").fadeIn(1500, function () {
                    $(this).load("kcalCounter.php", function () {
                        // $(this).fadeOut(1000)
                    })
                })

                // $.ajax({ // pass any info I want
                //     url: "load.php"
                //     data: {isPressed:"" }
                // })
            })
        })
    </script>
<body>
<div class="container">
    <div class="row">
        <button class="btn col-sm" id="kcalCount" style="width: 130px">Kcal counter</button>
    </div>
    <div class="row">
        <div class="col-sm" id="loadHere">

        </div>
    </div>
</div>
<?php
// kcal counter
// give the option to choose from existing foods in the database or add a new one
require "dailyIntake.php";

?>

</body>
</html>

