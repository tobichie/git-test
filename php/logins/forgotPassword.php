<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../bootstrap-3.4.1-dist/css/bootstrap.css">
    <script src="../bootstrap-3.4.1-dist/js/bootstrap.js"></script>

    <script>
        // // JavaScript code to dynamically change background image
        // document.addEventListener('DOMContentLoaded', function () {
        //     // Get the form and attach an event listener
        //     document.querySelector('form').addEventListener('submit', function (event) {
        //         event.preventDefault(); // Prevent form submission (page reload)
        //
        //         // Change the background image based on the button press
        //         document.body.style.backgroundImage = 'url("../logins/images/galaxy.jpg")';
        //     });
        // });
    </script>
    <style>
        header {
            padding: 10px;
            color: mediumpurple;
            border: 5px black;
            border-collapse: collapse;
            background: #53108e;
            opacity: 65%;
        }
        div {
            flex-wrap: wrap;
            padding: 10px;
            border-collapse: collapse;
            border: 10px black;
            vertical-align: center;
        }

        .row {
            justify-content: center;
            vertical-align: center;
        }

        .chooseEmail {
            offset: center;
        }

        body {
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .daMan {
            display: none;
        }

        body {
            vertical-align: center;
            background-image: url("<?php if (isset($_POST["change"])) {echo "../logins/images/galaxy.jpg";} if (!isset($_POST["change"])){echo "../logins/images/ciscmo.jpg"; } ?>");
        }

        span.what {
            color: white;
        }
    </style>

</head>
<body>

<div class="glyphicon-object-align-vertical">
    <h1 class="container"><header class="center row">Password reset or whatever</header></h1>
    <form method="post" action="forgotPassword.php">

        <div class="container-fluid">

            <div class="row " style="width: 100%">
                <div class="col s12">

                    <div class="input-field inline col offset-s4">

                        <input id="email_inline" type="email" class="validate" placeholder="Enter your Email"
                               name="email"
                               onclick="<?php $lift = "set"; ?>">
                        <input type="submit" class="daMan">
                        <?php

                        if (isset($_POST["submit"]))
                            echo "WAHAHAHAA";
                        ?>
                        <span class="helper-text col what white" data-error="wrong" data-success="right">Cars are considerably more flammable if you put gas in</span>

                    </div>

                </div>

            </div>

    </form>

    <div class="right">
        <i>
            <button class="btn purple-wave" name="<?php if (!isset($_POST["change"])) {
                echo "change";
            } ?>">Change Background
            </button> <?php // counter to cycle through the background images     ?>
        </i>
    </div>

</body>
</html>
<?php
