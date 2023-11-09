Make a Pizza
<form action="pizzating.php" method="get">
    Add the first Topping: <input type="text" name="t1">
    Add the second Topping: <input type="text" name="t2">
    <input type="submit" name="submit" value="submit">
</form>
<?php
$t1 = //((isset($_GET["t1"]) && $_GET["t1"] != null) ? $_GET["t1"] : null);
$t2 = ((isset($_GET["t2"]) && $_GET["t2"] != null) ? $_GET["t2"] : null);
$submit = ((isset($_GET["submit"]) && $_GET["submit"] != null) ? $_GET["submit"] : null);

if ($submit != null) {
    echo "A pizza with $t1 and $t2. Weird choice";
}


