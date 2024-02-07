<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 7.1</title>
</head>
<body>
<form method="POST" action="">
<label id="bedrag_label" for="bedrag">Bedrag exclusief BTW: </label>
<input type="number" name="bedrag">

<br>

<input type="radio" name="btw" value="9">Laag, 9%
<br>
<input type="radio" name="btw" value="21">Hoog, 21%

<br><br>

<input type="submit" name="submit_btn" value="Verzenden">
</form>


<?php

if ($_POST["btw"] == 9){
    $procent9 = $_POST["bedrag"] / 100 * 9;
    $totaal = $procent9 + $_POST["bedrag"];
};

if ($_POST["btw"] == 21){
    $procent21 = $_POST["bedrag"] / 100 * 21;
    $totaal = $procent21 + $_POST["bedrag"];
};

echo "Het bedrag inclusief BTW is: ", $totaal, " euro. <br>";

?>

</body>
</html>