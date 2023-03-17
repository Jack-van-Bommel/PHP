<?php
    echo "<h1>Update bier</h1>";
    require_once("functions.php");


    // Test of er op de wijzig-knop is gedrukt
    if (isset($_POST) && isset($_POST["wijzig_btn"])) {
        UpdateBier($_POST);

        // header("location: update_bier.php");
    }


    if (isset($_GET["biercode"])) {
        echo "Data uit vorige formulier:<br>";
        // Haal alle info van de betreffende biercode $_GET["biercode"]
        $biercode = $_GET["biercode"];

        $row = Getbieren($biercode);
    }
?>

<html>

</html>