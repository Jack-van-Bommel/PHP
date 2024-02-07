<!DOCTYPE html>
<html>
<body>

<?php

//bier namen en percentages tabel
try {
    $db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
    $query = $db->prepare("SELECT naam, alcohol FROM bier");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);

    echo "<table border=1 width=300>";
    echo "<th>Bieren</th> <th>Alcohol</th>";
    foreach ($result as &$data){
        echo "<tr><td>" . $data["naam"] . "</td>";
        echo "<td>" . $data["alcohol"] . "</td></tr>";
    }
    echo "</table>";

} catch (PDOException $e){
    die("Error: " . $e->getMessage());
}


?>

</body>
</html>