<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-color: aquamarine;
        }
        th, td {
            border: 1px solid #e3f4ff;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr {
            flex-direction: row;
            background-color: lightgrey;
        }
        button {
            margin-top: 5px;
            margin-outside: 5px;
        }
    </style>
    <script>
        function sureFunc(id){
            let sure = prompt('Are you sure you want to delete this?', 'Yes');
            if (sure === 'Yes') {
                location.href = "together.php?delete=" + id;
            }
        }
    </script>
</head>
<body>
<h1 class="center grey">Benutzer Liste</h1>
<form action="together.php" method="post">
    <table>
        <tr>
            <th>id</th>
            <th>User</th>
            <th>Password</th>
            <th> <!-- show Edit and Delete buttons on press -->
            <?php
            // if (!isset($_POST["add"])){
            //     echo "<th><button type='submit' name='add'>Add</button></th>";
            // }
            if (!isset($_POST["add"]) and !isset($_POST['edit'])){
                echo "<button type='submit' name='add'>Add</button></th>";
            }
            // if (!isset($_POST["add"]) and !isset($_POST['edit'])){
            //     echo "<button type='submit' name='copy'>Copy"
            // }

            ?>

        </tr>


