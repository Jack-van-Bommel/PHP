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

if (isset($_POST["toevoegen"])) {
    $fruits = array();
    array_push($fruits, $_POST["fruitsoort"]);
    var_dump($fruits);
}

?>

</body>
</html>