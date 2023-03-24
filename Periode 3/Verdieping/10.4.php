<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 10.4 uitbreiding cijfersysteem</title>
</head>
<body>
    
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=studentcijfers", "root", "");
    $query = $db->prepare("SELECT * FROM cijfers");
    $query->execute();
    $queryavg = $db->prepare("SELECT round(AVG(cijfer), 1) AS average FROM cijfers;");
    $queryavg->execute();
    $querymax = $db->prepare("SELECT MAX(cijfer) FROM cijfers");
    $querymax->execute();
    $querymin = $db->prepare("SELECT MIN(cijfer) FROM cijfers");
    $querymin->execute();
    $resultavg = $queryavg->fetchALL(PDO::FETCH_ASSOC);
    $resultmax = $querymax->fetchALL(PDO::FETCH_ASSOC);
    $resultmin = $querymin->fetchALL(PDO::FETCH_ASSOC);
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    
    echo "<table border=1px>";
    echo "<th>Leerling</th>";
    echo "<th>Cijfer</th>";
    foreach ($result as &$data) {
        echo "<tr><td class='leerling_cell'>";
        echo $data["leerling"] . "</td>";
        echo "<td>" . $data["cijfer"];
        echo "</td></tr>";
    }
    echo "</table>";

    echo "Het gemiddelde cijfer is een: ";
    foreach ($resultavg as $data) {
        echo $data["average"], "<br>";
    }
    echo "Het hoogste cijfer is een: ";
    foreach ($resultmax as $data) {
        echo $data["MAX(cijfer)"], "<br>";
    }
    echo "Het laagste cijfer is een: ";
    foreach ($resultmin as $data) {
        echo $data["MIN(cijfer)"];
    }

} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}

?>


</body>
</html>