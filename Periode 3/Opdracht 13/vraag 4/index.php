<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 13: Hoofdstuk 13 vraag 4</title>
</head>
<body>
    
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
    $password = password_hash("geheim", PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO gebruikers(username, password) VALUES('ik', '" . $password . "')");
    if($query->execute()) {
        echo "De nieuwe gegevens zijn toegevoegd!";
    } else {
        echo "Er is een fout opgetreden!";
    }
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>

</body>
</html>