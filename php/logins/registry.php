<?php


$inRegister = "yes";
// first connect and check connection
$host = "localhost";
$user = "root";
$pass = "Minecraft1";
$database = "tabellen";
$conn = mysqli_connect($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed...");
}
if (isset($_POST['register'])) {
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["username"])) {
        echo "<div class='container center red' name='error'>Username can only be letters and Numbers</div>";
    } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $_POST["password"])) {
        echo "<div class='container center red' name='error'>Password can only be letters and Numbers</div>";
    } else {
        $password = htmlspecialchars($_POST["password"]);
        $username = htmlspecialchars($_POST["username"]);

        // check if the username exists already
        $checkName = "SELECT Username FROM admincheck WHERE Username = '$username'";
        $checkNameResult = $conn->query($checkName);
        if ($checkNameResult->num_rows > 0){
            $exists = "yes";
        }

        $sql = "INSERT INTO admincheck(Username,Password, Status) VALUES('$username','$password', 'regular')";
        // save to db and check
        if (!isset($exists)) {
            if (mysqli_query($conn, $sql)) {
                // success
                $success = "yes";
                echo "<p class = 'green center container'>Success: Account has been created";
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }
        } else {
            $UserExists = "Username exists already";
            echo "<p class='red center container'>Error: . $UserExists</p>";
        }


    }

}
require "htmltop.php";
?>
</html>
</body>
