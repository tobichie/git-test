<script>
    $(document).ready(function () {
        $("#subit").click(function () {
            $("#divit").load("")
        })
    })
</script>


    <?php
    $conn = mysqli_connect("localhost", "root", "Minecraft1", "comments");
    if (!$conn) {
        die("Didn't work");
    } else {
        echo "WWW";
        if (isset($_POST["submit"])) {
            echo "JIJI";
            $name = $_POST["name"];
            $comment = $_POST["comment"];
            $sql = "INSERT INTO comments.kommentare (Name, Kommentar) VALUES ('" . $name . "', '" . $comment . "')";
            $result = $conn->query($sql);
            if ($result) {
                echo "Entered";
            }
        }

    }
    ?>
<?php // the name becomes a variable if isset and gets passed but the comment will not be.
// The name and Comment will be inserted into the database  ?>
