<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail pagina</title>
</head>
<body>
    
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
    $query = $db->prepare("SELECT * FROM fietsen WHERE id = " . $_GET["id"]);
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    foreach ($result as &$data){
        echo "Artikelnummer: " . $data["id"] . "<br>";
        echo "Merk: " . $data["merk"] . "<br>";
        echo "Type: " . $data["type"] . "<br>";
        echo "Prijs: &euro; " . number_format($data["prijs"], 2, ",", ".") . "<br><br>";
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}

?>

<a href="index.php">Terug naar de home pagina.</a>

</body>
</html>