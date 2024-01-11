<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        $(".add").click(function () {
            console.log("add clicked");
            let ID = $(this).attr("getID");
            let alarm = confirm("Are you sure you want to add this?");
            console.log(alarm);
            console.log(ID)
            if (alarm) { // Only proceed if the user clicks OK in the confirmation
                $.ajax({
                    type: "POST",
                    url: "addToData.php",
                    data: { ID: ID }, // Pass the actual values
                    success: function (response) {
                        $("#toTest").html(response); // Update the element with ID "toTest" with the response from addToData.php
                    },
                    error: function () {
                        console.log("Error in AJAX request");
                    }
                });
            }
        });
    });

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>
    .col-sm {
        text-align: center;
    }
</style>


<div class="navbar-header darken">
    <header>
        <div class="container">

            <div class="row">

                <div class="col-sm">
                    a
                </div>

                <div class="col-sm">
                    a
                </div>

                <div class="col-sm">
                    a
                </div>

                <div class="col-sm">
                    a
                </div>

                <div class="col-sm">
                    a
                </div>
                <div class="col-sm">
                    a
                </div>
                <div class="col-sm">
                    a
                </div>

            </div>

        </div>
    </header>
</div>

<?php
// instead of saving user info on a server, save immutable data on user devices instead, reducing security risks


// display a graph with all kcal eaten that day
// give option to add a food item from existing ones
// give option to search for specific food with live search
// if food ! exist give option to add
// eg. would you like to add...

// Database connection
$conn = mysqli_connect("localhost", "root", "Minecraft1", "food");
if ($conn) {

    $sql = "SELECT * FROM food ORDER BY NAME ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<form>";
        echo "<table class='table'>";
        echo "<tr><td>Add</td><td>Name</td><td>Kcal</td></tr>";
        while ($rows = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td class= 'add' id='add' getID = '" . $rows["ID"] . "'>+</td>";

            echo "<td>" . $rows["Name"] . " </td>";
            echo "<td>" . $rows["Kcal"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";



        echo "</form>";
    } else {
        echo "Nothing found";
    }
} else {
    echo "Couldnt connect to database";
}
// display all foods eaten that day
// display total kcal
?>
<div id="toTest"></div>
