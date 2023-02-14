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
<input type="text" name="num">

<br><br>

<input type="submit" value="Toevoegen" name="toevoegen_btn">
</form>

<br><br>

<?php
session_start();

//session variable doesn't keep adding numbers, instead changes entire value
$value = $_POST["num"];
$_SESSION["numbers"] = $value;
echo $_SESSION["numbers"];

?>

</body>
</html>