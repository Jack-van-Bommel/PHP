<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 7.4</title>
</head>
<body>
    
<form method="POST">
<label for="prijs">Prijs</label>
<input type="number" name="prijs">

<br>

<label for="korting">Korting (%)</label>
<input type="number" name="korting">

<br><br>

<input type="submit" value="Uitrekenen" name="btn">
</form>


<?php


echo "Bedrag inclusief", $_POST["korting"], "% korting: ", $answer;
?>

</body>
</html>