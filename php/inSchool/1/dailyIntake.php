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
    <script>
        $(document).ready(function () {
            $("#refresh").click(function () {
                location.reload()
            })
            $("#loadMore").click(function () {
                $("#load").load("loadMore.php");
            });
        });

    </script>
    <style>
        span {
        }
    </style>
</head>
<body>

<div class="text-center media-middle" id="load">
    <?php
    // show daily intake
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
    $sql = "SELECT * FROM daily ORDER BY TIMESTAMP DESC LIMIT 2";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            ?>
            <div class="container">
                <h1 class="display-4">Daily Intake</h1>
                <?php
                echo "<table class='table'>";
                echo "<tr><th>Name</th><th>Kcal</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Kcal"] . "</td>";
                    echo "</tr>";

                }

                echo "</table>";

                echo "<button id='loadMore' class='btn'>Load all</button>";
                ?>
                <div class="fixed"> <span id="refresh">↻</span></div>
            </div>
            <?php
        } else {
            echo "No results found";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    ?>
</div>

</body>
</html>
