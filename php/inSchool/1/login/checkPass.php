<?php

if (isset($_POST["password"])) {
    $rating = 0;
    $msg = [];

    if (strlen($_POST["password"]) <= 8) {
        $msg[] = "Password too short";
    } elseif (strlen($_POST["password"])){
        $rating += 20;
    }

    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST["password"])) {
        $msg[] = "Password not valid";

    } if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST["password"])) {
        $msg[] = "";
        $rating += 20;
    }

    $msges = implode(", ", $msg);

    echo '{"msg":"' . $msges . '", "rating":"' . $rating . '"}';
}
?>

