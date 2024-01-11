<!DOCTYPE html>
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
        .table {
            color: black;
            background-color: white;
            border-radius: 10px;
        }

        .total {
            border-radius: 10px;
            margin: 10px;
            align-items: center;
            align-content: center;
            text-align: center;
        }
    </style>
    <script>
        // if delete pressed delete the mf
        // on delete click
        function openNav() {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }

        $(document).ready(function () {
            $("#stats").load("functions.php")
            $('body').on('click', ".delete", function () {
                let ID = $(this).attr("getID");
                console.log(ID)
                $.ajax({
                    method: "POST",
                    url: "functions.php",
                    data: {
                        ID: ID
                    },
                    success: function (response) {
                        $("#dailyIntake").load("showDaily.php")
                    },
                })
            })


            $("#kcal").click(function () {
                let kcal = "kcal"
                $(".home").fadeIn(1000, function () {
                    $(this).load("functions.php", {kcal: "kcal"})
                })
            })
            $("#dailyIntake").load("showDaily.php")
            $('body').on('click', ".postID", function () {
                let ID = $(this).attr("getID");
                console.log(ID);
                if (ID) {
                    // now send the ID to another page
                    $.ajax({
                        method: "POST",
                        url: "process.php",
                        data: {ID: ID},
                        success: function () {
                            $("#dailyIntake").load("showDaily.php")
                        }
                    })
                }
            });
        });


    </script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
            font-family: "Google Sans", Roboto, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .counter {
            border: 1px black solid;
            margin: 10px;
            border-radius: 15px;
            color: white;
            background-color: black;
        }

        .counter:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }

        #sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            color: white;
        }

        #sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        #sidebar a:hover {
            color: #f1f1f1;
        }

        #main {
            transition: margin-left 0.5s;
            padding: 16px;
        }
    </style>
</head>
<body>

<div id="sidebar">
    <a href="javascript:void(0)" onclick="closeNav()">Close</a>
    <span id="dailyIntake"></span>
</div>

<div id="main">
    <button onclick="openNav()" class="btn">Open Sidebar</button>
</div>

<div class="container text-center home">
    <div class="row">
        <div class="display-4 counter" id="kcal">Kcal Counter</div>
    </div>
    <div class="row">
        <div class="display-4 counter" id="other-option">Other Option</div>
    </div>
</div>
</body>
</html>
