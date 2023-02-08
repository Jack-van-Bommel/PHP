<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css"> 
    <title>Opdracht 10: Hoofdstuk 9 vraag 1</title>
</head>
<body>
    
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
    $query = $db->prepare("SELECT * FROM fietsen");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);


    echo "<table>";
    foreach ($result as $data) {
        echo "<tr>";
            echo "<td>" . $data["merk"] . "</td>";
            echo "<td>" . $data["type"] . "</td>";
            echo "<td>&euro; " . number_format($data["prijs"], 2, ",", ".") . "</td>"; 
        echo "</tr>";
    }
    echo "</table>";


} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}


?>

</body>
</html>