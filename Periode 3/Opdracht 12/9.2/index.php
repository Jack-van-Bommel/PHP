<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
    $query = $db->prepare("SELECT * FROM fietsen");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    foreach ($result as &$data){
        echo "<a href='detail.php?id=" . $data["id"] . "'>";
        echo $data["merk"] . " " . $data["type"];
        echo "</a>";
        echo "<br>"; 
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}

?>

</body>
</html>
