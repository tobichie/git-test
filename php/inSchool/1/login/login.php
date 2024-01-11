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
    <script>
        $(document).ready(function () {
            $("#register").click(function () {
                location.href="register.php"
                console.log("HHHH")
                // $("#inside").load("register.php")
            })
            $("#submit").click(function () {
                let password = $("#password").val()
                let username = $("#username").val()
                console.log(password)
                console.log(username)
                $.ajax({
                    method: "POST",
                    url: "processLogin.php",
                    data: {password: password, username: username}
                })
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
    </style>
</head>
<div class="divit">

</div>

<div class="inside" id="inside">
    <header class="page-header text-center">
        <a href="https://youtube.com" target="_blank"><h1>Login</h1></a>
    </header>
    <body id="body">


    <div class="form-control">
        <label for="username">Username</label>
        <div class="text-center">
            <div class="">
                <input name="username" type="text" placeholder="Username" id="username">
            </div>
        </div>
        <label for="password">Password</label>
        <div class="text-center password">
            <div class="">
                <input type="password" placeholder="Password" id="password" name="password">
            </div>
        </div>
        <div class="text-center">
            <button class="btn" name="submit" id="submit">Submit</button>
        </div>
        <div class="btn text-center">
            Don't have an account?
                <button id="register">Register</button>
        </div>
    </div>


    </body>
</div>
</html>
<?php
