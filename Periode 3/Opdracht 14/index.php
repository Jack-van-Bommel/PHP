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

        $queryread = $db->prepare("SELECT naam, bericht, datumtijd FROM gasten");
        $queryread->execute();
        $result = $queryread->fetchALL(PDO::FETCH_ASSOC);

        if ($queryinsert->execute()) {
            echo "Gastenboek updated!";
            echo "<br><br>";
        }

        foreach ($result as $data) {
            echo $data["naam"], " - ", $data["datumtijd"];
            echo "<br>";
            echo $data["bericht"];
            echo "<br><br>";
        }

        return $db;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }


// werkt goed genoeg lmao
?>

</body>
</html>