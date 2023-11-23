<?php


// first connect and check connection


$host = "localhost";
$user = "root";
$pass = "Minecraft1";
$database = "tabellen";
$conn = mysqli_connect($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed...");
}


if (isset($_POST["submit"])) {

    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["username"])) {
        echo "<div class='container center red'> Username can only be letters and Numbers</div>";
        // echo "<div name='error'>Name can only be letters and Numbers</div>";
    } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["password"])) {
        echo "<div class='container center red'> Password can only be letters and Numbers</div>";
        // echo "<div name='error'>Password can only be letters and Numbers</div>";
    } else {
        $password = $_POST["password"];
        $username = $_POST["username"];
        // now check the id of the row that has that username and password
        // if it can't then offer to register

        $sql = "SELECT ID FROM admincheck WHERE Username = '$username' AND Password = '$password'";
        // next select the status
        $statusSelect = "SELECT Status FROM admincheck WHERE Username = '$username' AND Password = '$password'";
        $resultStatus = $conn->query($statusSelect);
        $result = $conn->query($sql);
        $otherSQL = "SELECT ID FROM admincheck WHERE Username = '$username' AND Password = '$password'";
        $otherResult = $conn ->query($otherSQL);
        if ($row = $resultStatus->fetch_assoc()) {
            if ($row["Status"] == "admin") {
                echo '<script>window.open("../TableGerüst&Co/together.php", "_blank");</script>';
            } if ($row["Status"] == "regular"){
                echo '<script>window.open("../pizzaninja/index.php", "_blank");</script>';
            } else {


            }

        } else {
            echo "<div class = 'center red container'>Unable to login, password or Username are incorrect</div>";
            }
        }



}
if (isset($_POST["register"])) {
    header("location: registry.php");
}
require "htmltop.php";
?>
</html>
</body>
