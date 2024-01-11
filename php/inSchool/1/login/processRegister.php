<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        let right = $("#error").val()
        $(right).submit(function () {
            $.ajax({
                method: "POST",
                url: "register.php",
                data: {
                    right: right
                }
                success: function (msg) {
                    alert("Data Saved: " + msg);
                },
            })
        })


    })
</script>

<?php
// check password input
// check email input
// check username �\VWw��`۠�`<5����9:βܫ���c

$conn = mysqli_connect("localhost", "root", "Minecraft1", "logins");
if (!$conn) {
    echo "couldnt connect";
} else {
    $error[] = [];
    $errorUser = 0;
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];


        // check the password next
        if (strlen($password) < 8) {
            $error[] .= "Password not long enough";
        }


        $pass = $_POST["password"];
        $user = $_POST["username"];
        $email = $_POST["email"];
        $hashedPass = hash("sha256", $pass, true);
        if (preg_match('/^[a-zA-Z0-9]+$/', $username)) {
            $errorUser = "Username is valid";
            // echo "Username is valid.";
            // $username is ready to be entered into the database here
        } else {
            $errorUser = "Invalid username";
        }


    }

}