<?php

// Handle Delete
function connect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "Minecraft1";
    $database = "tabellen";
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed");
    }
    return $conn;

}






// function getID($conn) {
//     $sql = "SELECT id, User, password FROM userinfo";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0){
//         while ($row = $result->fetch_assoc()) {
//             if (isset($row["ID"])) {
//                 $id = $row["ID"];
//             }
//         }
//     }
// }

function copyIt($conn)
{
    if (isset($_POST["copy"])) {

        // get the rows

        $sql = "SELECT User, Password FROM userinfo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $where = 0;
            while ($row = $result->fetch_assoc() and $where != 1) {
                $Username = $row["User"];
                $Password = $row["Password"];

                $copy = $_POST["copy"];
                // $id = getID($conn);

                $copyQuery = "INSERT INTO tabellen.userinfo (User, Password) VALUES ('" . $Username . "', '" . $Password . "')";
                $copyResult = $conn->query($copyQuery);
                if ($copyResult) {
                    echo "Copied";
                    $where = 1;
                }
            }
        }
    }

}


function delete($conn)
{
    $delete = $_REQUEST["delete"];
    // $id = "SELECT id FROM userinfo WHERE id='$butt'";
    // echo $id;
    $delQuery = "UPDATE userinfo SET deleted = now() WHERE id='$delete'";
    $delResult = $conn->query($delQuery);
    if ($delResult) {
        echo "DELETED";
    }

}

function insert($conn)
{
    if (isset($_POST["newUser"]) and isset($_POST["newPassword"])) {
        $newUser = $_POST["newUser"];
        $newPass = $_POST["newPassword"];
        $query = "INSERT INTO userinfo (User, password) VALUES('$newUser', '$newPass')";
        if (mysqli_query($conn, $query)) {
            header('Location: together.php');
        }
    }
    // success
}

function update($conn)
{

    if (isset($_POST["update"])) {
        $newPassword = $_POST["newPassword"];
        $newUser = $_POST["newUser"];
        $updateSql = "UPDATE userinfo SET User='$newUser', password='$newPassword' WHERE id='" . $_POST["update"] . "'";
        // $insertSql = "INSERT INTO userinfo (User, Password) VALUES ('" . $newUser . "', '" . $newPassword . "')  ";
        $updateResult = $conn->query($updateSql);
        if ($updateResult) {
            echo "UPDATED!";


        }
    }

}

function copyRow()
{
    $sql = "INSERT INTO userinfo (User, Password) SELECT User, Password FROM userinfo WHERE id=''";
}

function view($conn, $edit)
{

    $sql = "SELECT id, User, password FROM userinfo WHERE deleted is null";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // echo "<td>"
            if (isset($edit) and $row['id'] == $edit) {
                echo "<td>" . $row["id"] . "</td>";

                echo "<td><input type='text' name='newUser' value='" . $row["User"] . "'></td>";
                echo "<td><input type='text' name='newPassword' value='" . $row["password"] . "'></td>";
                echo "<td><button type='submit' name='update' value='" . $row["id"] . "'>Update</button></td>";
            } else {

                $id = $row["id"];
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["User"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>
                <button type='button' name='delete' value='" . $row["id"] . "' onclick='sureFunc(\"" . $row['id'] . "\")'>Delete</button>
                <button type='submit' name='edit' value='" . $row["id"] . "'>Edit</button>
                <input type='hidden' name='action' value=''>
                <button type='submit' name='copy' value='" . $row["id"] . "'>Copy</button>
                </td>";
            }
        }
    }
}


