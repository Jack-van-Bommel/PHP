<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 12: 9.9 opdracht 1</title>
</head>
<body>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbnamefietsenmaker", "root", "root");
        $query = $db->prepare("SELECT * FROM fietsen");
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        foreach($result as &$data) {
            echo $data["merk"] . " ";
            echo $data["type"] . " ";
            echo $data["prijs"] . " ";
        }
    } catch(PDOexception $e) {
        die("Error!: " . $e->getMessage());
    }

    //later
    ?>
</body>
</html>