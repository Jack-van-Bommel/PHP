<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<?php

$username_length = strlen($_POST["username"]);

echo "Your username is: ", $_POST["username"], "<br>";
switch($username_length){
    case 0: echo "ERROR: Username must have a minimum of 5 symbols", "<br>";
    case 1:
    case 2:
    case 3:
    case 4:
        echo "ERROR: Username must have a minimum of 5 symbols", "<br>";
}
echo "Your password is: ", $_POST["password"], "<br>";

echo "<br><br>";



$a[0] = "jan";
$a[1] = "rob";
$a[2] = "piet";
$b = array(10, 11, 12, 34, 100, 1000);

echo "<table border=1 width=200>";
echo "<tr><td>";

foreach($b as $value){
    echo $value. "<br>";
};

echo "</td></tr>";
echo "</table>";

?>

</body>
</html>