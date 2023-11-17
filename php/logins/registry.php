<?php


$inRegister = "yes";
// first connect and check connection
$host = "localhost";
$user = "root";
$pass = "Minecraft1";
$database = "logins";
$conn = mysqli_connect($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed...");
}
if (isset($_POST['register'])) {
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["username"])) {
        echo "<div name='error'>Name can only be letters and Numbers</div>";
    } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["password"])) {
        echo "<div name='error'>Password can only be letters and Numbers</div>";
    } else {
        $password = htmlspecialchars($_POST["password"]);
        $username = htmlspecialchars($_POST["username"]);
    }
}
require "htmltop.php";
?>
</html>
</body>
