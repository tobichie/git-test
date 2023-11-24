<?php


// Handle Delete
function connect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "Minecraft1";
    $database = "movies";
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

        $sql = "SELECT Name, Categorie, Rating, Timestamp FROM allmovies";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $where = 0;
            while ($row = $result->fetch_assoc() and $where != 1) {
                $Name = $row["Name"];
                $Category = $row["Categorie"];
                $Rating = $row["Rating"];
                $Timestamp = $row["Timestamp"];

                $copy = $_POST["copy"];
                // $id = getID($conn);

                $columns = "Name, Categorie, Rating, Timestamp";

// Source table
                $sourceTable = "allmovies";

// Target table
                $targetTable = "movies.allmovies";

// SQL query
                $copyQuery = "INSERT INTO $targetTable ($columns)
              SELECT $columns
              FROM $sourceTable ";
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
    $delQuery = "DELETE FROM allmovies WHERE `Index`='$delete'";
    $delResult = $conn->query($delQuery);
    if ($delResult) {
        echo "DELETED";
    }

}

function insert($conn)
{
    if (isset($_POST["newName"]) and isset($_POST["newCategory"]) and isset($_POST["newRating"]) and isset($_POST["newTimestamp"])) {
        $newName = $_POST["newName"];
        $newCategorie = $_POST["newCategory"];
        $newRating = $_POST["newRating"];
        $newTimestamp = $_POST["newTimestamp"];
        $query = "INSERT INTO allmovies (Name, Categorie, Rating, Timestamp) VALUES('$newName', '$newCategorie' , '$newRating' , '$newTimestamp')  ";
        if (mysqli_query($conn, $query)) {
            header('Location: FilmAdminDashboard.php');
        }
    }
    // success
}

function update($conn)
{

    if (isset($_POST["update"])) {
        $newName = $_POST["newName"];
        $newCategorie = $_POST["newCategorie"];
        $newRating = $_POST["newRating"];
        $newTimestamp = $_POST["newTimestamp"];

        $idsql = "SELECT `Index` FROM allmovies WHERE Name = '" . $_POST["newName"] . "'";
        $idResult = $conn->query($idsql);

        if ($idResult->num_rows) {
            // Assuming there is only one result, you can fetch the index
            $row = $idResult->fetch_assoc();
            $index = $row["Index"];

            // Now you can use $index in your update query
            $updateSql = "UPDATE allmovies SET Name='$newName', Categorie='$newCategorie', Rating = '$newRating', Timestamp = '$newTimestamp' WHERE `Index`='$index'";
            $updateResult = $conn->query($updateSql);

            if ($updateResult) {
                echo "UPDATED!";
            }
        } else {
            echo "Index not found.";
        }

    }

}

function copyRow()
{
    // $sql = "INSERT INTO allmovies (User, Password) SELECT User, Password FROM userinfo WHERE id=''";
}

function view($conn, $edit)
{

    $sql = "SELECT `Index`, Name,  Categorie, Rating, Timestamp FROM allmovies";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // echo "<td>"
            if (isset($edit) and $row['Index'] == $edit) {
                echo "<td>" . $row["Index"] . "</td>";

                echo "<td><input type='text' name='newName' value='" . $row["Name"] . "'></td>";
                echo "<td><input type='text' name='newCategorie' value='" . $row["Categorie"] . "'></td>";
                echo "<td><input type='text' name='newRating' value='" . $row["Rating"] . "'></td>";
                echo "<td><input type='text' name='newTimestamp' value='" . $row["Timestamp"] . "'></td>";
                echo "<td><button type='submit' name='update' value='" . $row["Index"] . "'>Update</button></td>";
            } else {

                echo "<td>" . $row["Index"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Categorie"] . "</td>";
                echo "<td>" . $row["Rating"] . "</td>";
                echo "<td>" . $row["Timestamp"] . "</td>";
                echo "<td>
                <button type='button' name='delete' value='" . $row["Index"] . "' onclick='sureFunc(\"" . $row['Index'] . "\")'>Delete</button>
                <button type='submit' name='edit' value='" . $row["Index"] . "'>Edit</button>
                <input type='hidden' name='action' value=''>
                <button type='submit' name='copy' value='" . $row["Index"] . "'>Copy</button>
                </td>";
            }
        }
    }
}



