<?php
    echo "<h1>Update Bier</h1>";
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_wzg'])){
        UpdateBier($_POST);
    }

    if(isset($_POST['wzg'])){  
        echo "<br>Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende biercode $_POST['wzg']
        $biercode = $_POST['wzg'];
        $row = GetBier($biercode);
    }
   ?>

<html>
    <body>
        <form method="post">
        <br>
        Naam:<input type="" name="naam" value="<?php echo $row['naam'];?>"><br> 
        Soort: <input type="text" name="soort" value="<?= $row['soort']?>"><br>
        Stijl: <input type="text" name="stijl" value="<?= $row['stijl']?>"><br>
        Alcohol: <input type="text" name="alcohol" value="<?= $row['alcohol']?>"><br>
        Brouwcode: <input type="text" name="brouwcode" value="<?= $row['brouwcode']?>"><br><br>
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
    </body>
</html>