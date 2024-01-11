<?php
print_r($_POST);
if (isset($_POST["password"]) && isset($_POST["username"])){
    echo "received";

    $pass = $_POST["password"];
    $hashedPass = hash("sha256", $pass, true);
    echo $hashedPass;

//

















} else {
    echo "Not received";
}
