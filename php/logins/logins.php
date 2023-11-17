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
        $pregerr = "Password can only be letters and Numbers";
        // echo "<div name='error'>Name can only be letters and Numbers</div>";
    } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["password"])) {
        $pregerr = "Password can only be letters and Numbers";
        // echo "<div name='error'>Password can only be letters and Numbers</div>";
    } else {
        $password = htmlspecialchars($_POST["password"]);
        $username = htmlspecialchars($_POST["username"]);

        // now check the id of the row that has that username and password
        // if it can't then offer to register

        $sql = "SELECT ID FROM logincheck WHERE Username = '$username' AND Password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Exists";
            header("location: ../pizzaninja/index.php");
        } else {
            $error = "User doesn't exist";
            // You can offer to register here if the user doesn't exist

        }
    }
}
if (isset($_POST["register"])){
    header("location: registry.php");
}
require "htmltop.php";
?>
</html>
</body>
