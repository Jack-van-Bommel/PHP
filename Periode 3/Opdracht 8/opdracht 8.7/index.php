<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 8: Hoofdstuk 7, vraag 7</title>
</head>
<body>

<form method="POST" action="">
<label for="startkapitaal">Startkapitaal</label>
<input type="number" name="startkapitaal">

<br>

<label for="rentepercentage">Rentepercentage</label>
<input type="number" name="rentepercentage">

<br>

<label for="jaarlijkseopname">Jaarlijkse Opname</label>
<input type="number" name="jaarlijkseopname">

<br>
<br>

<input type="submit" value="Bereken de looptijd">
</form>

<br><br><br>


<?php

if (isset($_POST["startkapitaal"]) && isset($_POST["rentepercentage"]) && isset($_POST["jaarlijkseopname"])) {
    calculate();
}

function calculate() {
        $rente0 = $_POST["rentepercentage"] / 100;
        $rente100 = $rente0 + 1;
        $hoeveel = $_POST["startkapitaal"];
        $jaar = 0;

        while ($hoeveel > 0) {
            $hoeveel = $hoeveel * $rente100 - $_POST["jaarlijkseopname"];
            $jaar++;
        }
        echo "U kunt ", floor($jaar - 1), " jaar lang ", "&euro; ", $_POST["jaarlijkseopname"], " opnemen";
}


?>

</body>
</html>