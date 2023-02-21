<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 8, hoofdstuk 7 vraag 8</title>
</head>
<body>
  
<form method="POST" action="">
    <label for="fruitsoort">Fruitsoort: </label>
    <input type="text" name="fruitsoort">
    <br><br>

    <input type="submit" name="toevoegen" value="Toevoegen">
    <input type="reset" name="reset" value="Reset">
    <br><br>

    <p>--------------------</p>
    <br>

    <input type="submit" value="Sorteren" name="sorteer_btn">
    <input type="submit" value="'Schudden'" name="schud_btn">
    <br>

    <p>--------------------</p>
    <br><br>
</form>


<?php
session_start();
echo "Inhoud van de array: <br>";


if (isset($_POST["fruitsoort"])) {
    initialise();
    inhoudprint();
} 

if (isset($_POST["sorteer_btn"])) {
    initialise();
    sortarray();
}

function initialise() {
    $tempfruit = $_POST["fruitsoort"];
    $_SESSION["fruit"][] = $tempfruit;
}

function inhoudprint() {
    foreach ($_SESSION["fruit"] as $data) {
        echo "- ", $data;
        echo "<br>";
    }
}

function sortarray() {
    $sorted = sort($_SESSION["fruit"]);
    foreach ($sorted as $data) {
        echo "- ", $data;
        echo "<br>";
    }
}
?>

</body>
</html>