<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<?php

//inlog gedeelte
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


//array 
$a = ["jan", "rob", "piet"];

echo "<table border=1 width=200>";
foreach ($a as &$data){
    echo "<tr><td>";
    echo $data;
    echo "</td></tr>";
}
echo "</table>";
echo "<br><br>";


//inlog as table
echo "<table border=1 width=200>";
echo "<tr><td>Username</td><td>" . $_POST["username"] . "</td></tr>";
echo "<tr><td>Password</td><td>" . $_POST["password"] . "</td></tr>";
echo "</table><br><br>";
// express geen foreach gebruikt aangezien we maar 1 set gegevens hebbens

?>

</body>
</html>