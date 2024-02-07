<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 7 hoofdstuk 9 poll maken</title>
</head>
<body>
    
<?php
// Function part
function connectdb() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=poll", "root", "");
        $query = $db->prepare("SELECT vraag FROM poll");
        $query->execute();
        $vraag = $query->fetchALL(PDO::FETCH_ASSOC);

        return $vraag;
    } 
    catch (PDOexception $e) {
        die("ERROR 1: " . $e->getMessage());
    }
}

function form() {
    echo "<form method='POST'>";
    echo "<input type='radio' name='opties' value='1' checked>";
    echo "<label for='optie_1'>Inderdaag, PHP is het helemaal</label>", "<br>";

    echo "<input type='radio' name='opties' value='2'>";
    echo "<label for='optie_2'>PHP is leuk, maar niet het leukste</label>", "<br>";

    echo "<input type='radio' name='opties' value='3'>";
    echo "<label for='optie_3'>PHP is saai</label>", "<br>";

    echo "<input type='radio' name='opties' value='4'>";
    echo "<label for='optie_4'>Geen mening</label>", "<br>";

    echo "<input type='submit' value='Inleveren' name='submit_btn'>";
    echo "</form>";
}

function check() {
    if (isset($_POST["opties"])) {
        $answerid = $_POST["opties"];
        return $answerid;
    }
}

function sendvote() {
    if (isset($_POST["submit_btn"])) {
        $answerid = check();

        try {
            $db = new PDO("mysql:host=localhost;dbname=poll", "root", "");
            $queryupdate = $db->prepare("UPDATE opties SET stemmen = stemmen + 1 WHERE id = $answerid");
            $queryupdate->execute();
            echo "Uw stem is toegevoegd!";
        }
        catch (PDOexception $e) {
            die("ERROR 2: " . $e->getMessage());
        }
    }
}


// Echo's part
$vraag = connectdb();

foreach ($vraag as $data){
    echo $data["vraag"];
    echo "<br><br>";
}

form();

sendvote();

?>

</body>
</html>