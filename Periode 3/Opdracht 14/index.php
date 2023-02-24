<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
</head>
<body>
<form method="POST" action="">
    <label for="naam">Naam</label>
    <input type="text" name="naam">

    <br>

    <label for="bericht">Bericht</label>
    <textarea name="bericht"></textarea>

    <br>

    <input type="submit" name="submit_btn" value="Opslaan">
</form>    


<?php

    $username = "root";
    $password = "";
    $dbname = "gastenboek";
    $servername = "localhost";
    

    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");

        if (isset($_POST["submit_btn"])) {
            $name = $_POST["naam"];
            $bericht = $_POST["bericht"];
            $queryinsert = $db->prepare("INSERT INTO gasten(naam, bericht) VALUES ('$name', '$bericht')");
        }    
        if ($queryinsert->execute()) {
            echo "De data is opgestuurd";
        }

        $queryread = $db->prepare("SELECT naam, bericht, datumtijd FROM gasten");
        $result = $queryread->fetchALL(PDO::FETCH_ASSOC);
        return $db;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }


?>

</body>
</html>