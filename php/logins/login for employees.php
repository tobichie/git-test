<?php
require "htmltop.php";
if (isset($_POST["submit"])) {
    if (!connect()) { // if it connects continue
        // $conn = connect();
        echo "dhdhd";
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST["username"], $_POST[""])) {
            echo "<div name='error'>Name can only be letters and Numbers</div>";
            echo "<div name='error'>Name can only be letters and Numbers</div>";
        }
        else {
            echo "all good";
            $password = $_POST["password"];
            $username = $_POST["username"];
            if (checkdatabase()){
                echo "Not found in the database";
            }
    }
        // Next check if it exists in the database
    }
}

?>
    </html>
    </body>


<?php
// funktionen

// is it both
function connect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "Minecraft1";
    $database = "logins";
    $conn = mysqli_connect($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed...");
    }
    else{
        // return $conn;
    }

}

function checkdatabase() {
    // get the id for the row with the VALUES of the username and password
    // if it can't then offer to register
    $sql = "SELECT ID FROM logincheck WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);
}





?>