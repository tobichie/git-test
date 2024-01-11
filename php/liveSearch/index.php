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
        #movie{
            display: none;
        }
        #search {
            margin: 5px;
        }
    </style>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Live Search in Database</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="search">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>City</th>
                    <th>Salary</th>
                </tr>
                </thead>
                <tbody id="output">
                <?php
                $conn = mysqli_connect("localhost", "root", "Minecraft1", "employee");
                $sql = "SELECT * FROM employee.employees";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    while (($row = mysqli_fetch_assoc($result))) {
                        echo "<tr>
                    <td>" . $row['first_name'] . " </td >
                    <td>" . $row['last_name'] . " </td >
                    <td>" . $row['city'] . " </td >
                    <td>" . $row['salary'] . " </td >
                </tr> ";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#search").keypress(function () {
            $.ajax({
                type: 'POST',
                url: 'search.php',
                data: {
                    name: $("#search").val(),

                },
                success: function (data) {
                    $("#output").html(data)
                }
            })
        })
    })
</script>
<div class="right">
    <form action="index.php" method="post">
        <button class="btn blue-wave" type="submit" name="AH">AAAAHHHHHH</button>
    </form>
    <?php
    if (isset($_POST["AH"]) && !isset($leave)) {
        $leave = "set";
        echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/Wl0S-3C_N-s?si=hoOjGqBOngwsMkO5&autoplay=1' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
    } if (isset($leave)){
        echo "<form action='index.php' method='post'>";
        echo "<button class='btn blue-wave' name='close' id='close'>Close</button>";
        echo "</form>";
    }

    ?>
</div>
<div>
    <iframe id='movie' width='1000' height='1000' src = 'https://www.youtube.com/embed/Wl0S-3C_N-s?si=hoOjGqBOngwsMkO5&autoplay=1' title = 'YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
</div>
</body>
</html>
