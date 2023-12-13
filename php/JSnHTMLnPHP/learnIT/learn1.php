<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        div.what {
            border: black 1px solid;
            border-radius: 10px;
            padding: 10px;
            background: #ffffff;
            margin: 5px;
            border-collapse: collapse;
        }

        button {
            padding: 10px;
            background: #5f5e5e;
            color: white;
            margin: 5px;
            border-radius: 10px;
        }

        body {
            color: black;
            background: lightgrey;

        }

    </style>
    <script>
        // $(document).ready(function () {
        //     $("p").click(function () {
        //         $.ajax({
        //             method: "POST",
        //             url: "some.php",
        //             data: { name: "John", location: "Boston" },
        //             success: function (msg) {
        //                 alert("Data Saved: " + msg);
        //             },
        //             error: function (xhr, status, error) {
        //                 console.error("AJAX request failed:", status, error);
        //             }
        //         });
        //     });
        //     $("input").change(function () {
        //         $.ajax({
        //             method: "POST",
        //             url: "some.php",
        //             data: {array: "ThisOne"},
        //             success: function (msg){
        //                 alert("Data saved mane" + msg)
        //             },
        //             error: function (xhr, status, error) {
        //                 console.error("AJAX request failed", status, error);
        //             }
        //         })
        //     })
        // });
    </script>


    <script>
        // jQuery
        let commentCount = 2
        $(document).ready(function () {
            $("#btn").click(function () {
                commentCount = commentCount + 2
                $("#comments").load("some.php", {
                    commentNewCount: commentCount
                });
            });
            // $("#foot").click(function () {
            //     location.reload()
            // })

            // $("#addit").click(function () {
            //     $("#divit").load("divThat.php")
            // })
            // $("#name").submit(function (){
            //     $("#comments").load("some.txt")
            // })

        });
    </script>
</head>
<body id="bod">
<div class="center page-header"><h1>Comments</h1></div>
<br>
<form action="learn1.php" method="POST">
    <button id="addit" class="center" type="submit" name="jChrist">+</button>
</form>
<?php if (isset($_POST["jChrist"])){ ?>
<div id="divit" class="input-field container">
    <form action="learn1.php" method="post">
        <div class="center">
            <div>
                <p>Name: </p>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <p>Comment: </p>
                <input type="text" id="comment" name="comment">
            </div>
            <br>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
    <?php } ?>
    <?php
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "comments");
    if (!$conn) {
        die("Didn't work");
    } else {
        $date = date("Ymd");
        if (isset($_POST["submit"])) {
            if ($_POST["name"] and $_POST["comment"] != "") {

                echo "here";
                $name = $_POST["name"];
                $comment = $_POST["comment"];
                $sql = "INSERT INTO comments.kommentare (Name, Kommentar, currentDate) VALUES ('" . $name . "', '" . $comment . "', '" . $date . "')";
                $result = $conn->query($sql);
                if ($result) {
                    $done = true;
                }
            } else {
                $error = "set";
            }

        }

    }
    ?>
</div>

<div id="comments" class="left container">
    <?php
    // Make a field to add comments to the Database
    // Only a soft delete (if any)
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "Comments");
    $sql = "SELECT * FROM Comments.kommentare ORDER BY currentDate DESC LIMIT 2 ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='what'>";
            echo "<div class=''>" . $row["Name"] . ": </div>";
            echo "<div class=''>" . $row["Kommentar"] . "</div>";
            echo "</div>";
        }
    } else {
        echo "Couldn't find anything in the Database";
    }


    ?>
</div>
<div id="add" class="huh" name="add"></div>
<br>
<div>
    <button class="grey btn" id="btn">Show more comments</button>
</div>
<form action="learn1.php" method="post">
    <div>
        <button id="foot" class="foot" name="foot" type="submit">Reload</button>
    </div>
</form>
<?php
if (isset($_POST["foot"])) {
    header("location: learn1.php");
    echo "HUH";
}
?>

<!-- <p>This is a paragraph</p>
<label for="input"></label>
<input type="text" id="input" name="input" > -->
</body>
</html>
