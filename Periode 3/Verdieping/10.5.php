<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10.5 php uitbreiding poll</title>
</head>
<body>
    
<?php

function connectdb(){
    try {
        $db = new PDO("mysql:host=localhost;dbname=poll", "root", "");
        $queryread = $db->prepare("SELECT optie, stemmen FROM opties");
        $queryread->execute();      
        return $queryread;
    }
    catch (PDOException $e) {
        die("Error: " . $e->getmessage());
    }
}


$queryread = connectdb();


echo "<table border=1px>";
echo "<tr><th>Stelling van de maand: 'PHP is de leukste programmeertaal!'</th></tr>";
echo "<tr><td>Aantal uitgebrachte stemmen: $totaalstemmen</td></tr>";
foreach ($queryread as $data) {
    echo "<tr>";
    echo "<td>", $data["optie"], "</td>";
    echo "<td>", $data["stemmen"], "</td>";
    echo "</tr>";
}
echo "</table>";

?>

</body>
</html>