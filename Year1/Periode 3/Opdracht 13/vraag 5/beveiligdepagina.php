<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Beveiligde ingelogde pagina (ALLEEN BEKIJKEN ALS JE INGELOGD BENT!!!!!</h1>
<br>

<?php
session_start();

if ($_SESSION["login"] == true) {
    echo "Je bent succesvol ingelogd!";
    echo "<br>";
    echo "<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>Geheime gegevens!</a>";
} else {
    echo "ERROR: INLOG GEFAALD!";
}

?>

</body>
</html>