<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Cijfersysteem</title>
</head>
<body>
    
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=studentcijfers", "root", "");
    $query = $db->prepare("SELECT * FROM cijfers");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    
    echo "<table>";
    echo "<th>Leerling</th>";
    echo "<th>Cijfer</th>";
    foreach ($result as &$data) {
        echo "<tr><td class='leerling_cell'>";
        echo $data["leerling"] . "</td>";
        echo "<td>" . $data["cijfer"];
        echo "</td></tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}

?>

</body>
</html>