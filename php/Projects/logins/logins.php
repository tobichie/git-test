<?php
$host = "localhost";
$user = "root";
$pass = "Minecraft1";
$database = "food";

$conn = mysqli_connect($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["username"])) {
        echo "<div class='container center red'>Username can only be letters and numbers</div>";
    } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["password"])) {
        echo "<div class='container center red'>Password can only be letters and numbers</div>";
    } else {
        $password = $_POST["password"];
        $username = $_POST["username"];
        echo "SQL Query: SELECT ID FROM food.logincheck WHERE Username = '$username' AND Password = '$password'";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT ID FROM food.logincheck WHERE Username = ? AND Password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID);

        if ($stmt->fetch()) {
            echo "<div class='center green container'>Success. ID: $ID</div>";
        } else {
            echo "<div class='center red container'>Unable to login, password or username is incorrect</div>";
        }

        $stmt->close();

    }

    if (isset($_POST["register"])) {
        header("location: registry.php");
    }
}

require "htmltop.php";
?>
</html>
</body>
