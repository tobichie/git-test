<?php
/**
 * @return void
 */
// Connect to database


function connect($hostname, $username, $password, $database)
{
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed");
    }


}
// ==
$hostname = "";
$username = "";
$password = "";
$database = "";
connect( $hostname, $username, $password, $database);
?>
<?php
// Make the table
?>
<table>
    <tr>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
    </tr>
</table>


<?php
$sql = "SELECT id, User, password FROM userinfo";
$result = $conn->query($sql);
?>
