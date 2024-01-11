<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script
            src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous">
    </script>
    <style>
        body {
            background-color: #6c6b6b;
        }
        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 70vh;
        }

        .centreIt {
            /* Adjust the height if needed */
        }



        .colu {
            /* Add any additional styling for colu if needed */
            background-color: black;
            color: white;
            margin: auto;
            border-radius: 6px;

        }
        .lul {
            height: 100%;
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#showIt").click(function () {
                $("#colu").fadeIn(500, function () {
                    $(this).load("another.php", function () {
                        $(this).fadeIn(500);
                    });
                });
            });

            $("#colu").click(function () {
                $("#colu").load("openedit.php");
            });



            $("#testBTN").click(function () {
                $("#testLOAD").fadeIn(1500, function () {
                    $(this).load("sha.php", function () {
                        $(this).fadeOut(1500)
                    })
                })
            })

        });


    </script>
</head>
<body>
<button id="testBTN">AAAAA</button>
<div id="testLOAD">
</div>

<div class="center">
    <div class="centreIt"></div>
    <div class="bot">
        <button class="btn" id="addIt">Add</button> <?php // this btn adds the next one ?>
        <button class="btn" id="showIt">Show</button> <?php // show all ?>
    </div>
    <div class="container">
        <header>Notes</header>
        <div class="col colu lul" id="colu">
            <?php

            $conn = mysqli_connect("localhost", "root", "Minecraft1", "power");
            if (!$conn){
                die("Couldn't connect");
            }
            $sql = "SELECT * FROM power.users ORDER BY name DESC LIMIT 2";
            $result = $conn->query($sql);
            if ($result -> num_rows > 0){
                while ($rows = $result->fetch_assoc()){
                    echo "<div name='' id=''> ". $rows['name'] . "</div>";
                    echo "<br>";
                }
            }
            ?>
        </div> <?php // if add is pressed show the place where you can add right here ?>
    </div>
</div>
</body>
</html>
