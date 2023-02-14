<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 8: Hoofdstuk 7 vraag 6</title>
</head>
<body>
    
<form method="POST" action="">
<label for="num">Nummer: </label>
<input type="text" name="num" minlenght=1 maxlength=9>

<br><br>

<input type="submit" value="Toevoegen" name="toevoegen_btn">
</form>

<br><br>

<?php
session_start();

if (isset($_POST["num"])) {
    counting();
    echo "<br>";
    echo "Gemiddelde: " . arraycount();
}

function arraycount() {
    $num = $_POST["num"];
    $_SESSION["numvar"][] = $num;

    $total = array_sum($_SESSION["numvar"]);
    $totalarrays = count($_SESSION["numvar"]);
    $answer = $total / $totalarrays;
    return $answer;
}

function counting() {
    $_SESSION["counting"]++;
    echo "Aantal toegoevoegde cijfers: " . $_SESSION["counting"];
}

?>

</body>
</html>