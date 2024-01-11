<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/976840c6ae.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <?php
    if (isset($_POST["right"])) {
        $right = $_POST["right"];
        echo $right;
    }
    ?>
    <script>
        $(document).ready(function () {
                $("#password").keyup(function () {
                    $.ajax({
                        method: "POST",
                        url: "checkPass.php",
                        data: {
                            password:$(this).val()
                        },
                        success: function (msg) {
                            let values = JSON.parse(msg)
                            $("#error").html(values.msg)
                            $("#progress").css({'width': values.rating + "%"})
                        },
                    })


                    if (password.length > 0) {
                        if (password.length >= 8) {

                        } else {
                            $("#error").html("Password not long enough")
                            $("#progress").css({'width': 0})


                        }
                    }
                })



        })
    </script>
    <style>

        .inside {
            background-color: whitesmoke;
            max-width: 500px; /* Adjust the max-width as needed */
            margin: auto; /* Center the content horizontally */
            padding: 20px; /* Add padding for better readability */
            border: #c9c9c9 1px solid;
            border-radius: 5px;
        }

        .page-header {
            height: 7vh;
            background-color: lightgrey;
        }

        .divit {
            height: 30vh;
        }

        header {
            border-radius: 5px;
        }

        .btn {
            border: lightgrey 1px solid;
            border-radius: 3px;
            margin-top: 10px;
        }

        #myProgress {
            width: 100%;
            background-color: grey;
        }

        #myBar {
            width: 10px;
            height: 15px;
            background-color: green;
        }

        .progress {
            margin: 15px;
        }
    </style>
</head>
<div class="divit">
    <?php
    if (isset($_POST["right"])) {
        echo "ting done";
        $right = $_POST["right"];
        echo $right;
    }
    ?>
</div>

<div class="inside">
    <header class="page-header text-center">
        <a href="https://youtube.com" target="_blank"><h1>Register</h1></a>
    </header>
    <body>


    <div class="form-control text-center">
        <label for="username">Username</label>
        <div class="text-center">
            <div class="">
                <div id="errorUser" aria-errormessage="RAAAA" style="color: red"></div>
                <input name="username" type="text" placeholder="Username" id="username">
            </div>
        </div>
        <label for="password">Password</label>
        <div class="text-center password">
            <div class="">
                <div id="error" style="color: red"></div>
                <input type="password" placeholder="Password" id="password" name="password">
                <div class="progress">
                    <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated"
                         role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                         style="width: 0%"></div>
                </div>
            </div>
        </div>
        <div class="text-center password">
            <div class="mail">
                <label for="email">Enter your email: </label> <br>
                <input type="email" placeholder="Email" id="email" name="email" aria-describedby="emailHelp"
                       style="position: relative">
            </div>
        </div>
        <div class="text-center">
            <button class="btn" name="submit" id="submit">Submit</button>
        </div>

    </div>


    </body>
</div>
</html>
<?php
