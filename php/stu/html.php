<select name="selector" id="selectIt">AAA</select>
dfd
<?php

// Check if the variable is set in the POST request
if (isset($_POST["myData"])) {
    $receivedVariable = $_POST["myData"];



    echo "Received Data: " . $receivedVariable;
} else {
    echo "No data received.";
}


// mdst 6 zeichen
// muss sonderzeichen
// Groß und Klein schreibung
// password qualität
// entropy tool
// salt & Hash
// jquery und java
// no submit needed

?>