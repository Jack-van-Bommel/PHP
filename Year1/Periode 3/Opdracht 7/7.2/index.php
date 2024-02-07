<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 7.2</title>
</head>
<body>
 
<form method="POST" action="">
    <label for="num1">Getal 1</label>
    <input type="number" name="num1" placeholder="Getal 1">

    <br>

    <input type="radio" name="usage" value="optellen" checked>
    <label for="usage">Optellen</label>

    <input type="radio" name="usage" value="aftrekken">
    <label for="usage">Aftrekken</label>

    <input type="radio" name="usage" value="vermenigvuldigen">
    <label for="usage">Vermingvuldigen</label>

    <input type="radio" name="usage" value="delen">
    <label for="usage">Delen</label>

    <br>

    <label for="num2">Getal 2</label>
    <input type="number" name="num2" placeholder="Getal 2">

    <br>
    <br>

    <input type="submit" value="Berekenen">
</form>

<?php
echo "<br>";

// Checks if the variable is set to prevent an error on the website before radio usage is set
if (!isset($_POST["usage"])) {
    $_POST["usage"] = "not set";
}

// switch case to decide which radio usage is set and what to do
switch ($_POST["usage"]) {
    case "optellen": $answer = $_POST["num1"] + $_POST["num2"];
    case "optellen": echo $_POST["num1"], " + ", $_POST["num2"], " = ", "$answer";
    break;
    case "aftrekken": $answer = $_POST["num1"] - $_POST["num2"];
    case "aftrekken": echo $_POST["num1"], " - ", $_POST["num2"], " = ", "$answer";
    break;
    case "vermenigvuldigen": $answer = $_POST["num1"] * $_POST["num2"];
    case "vermenigvuldigen": echo $_POST["num1"], " x ", $_POST["num2"], " = ", "$answer";
    break;
    case "delen": $answer = $_POST["num1"] / $_POST["num2"];
    case "delen": echo $_POST["num1"], " : ", $_POST["num2"], " = ", "$answer";
    break;
    case false: echo"niks ingevoerd";
}


?>

</body>
</html>