<?php
// Update bier in the database
// Auteur: Jack

    // Initialising
    echo "<h1>Update Bier</h1>";
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_wzg'])){
        UpdateBier($_POST);
    }

    // Test if we have the biercode
    if(isset($_GET['biercode'])){  
        echo "<br>Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende biercode $_GET['biercode']
        $biercode = $_GET['biercode'];
        $row = GetBier($biercode);
    }
    
   ?>

<!-- HTML code for the form -->
<html>
    <body>
        <form method="post">
        <br>
        Biercode:<input type="" name="biercode" value="<?php echo $row['biercode'];?>"><br>
        Naam:<input type="" name="naam" value="<?php echo $row['biernaam'];?>"><br> 
        Soort: <input type="text" name="soort" value="<?= $row['soort']?>"><br>
        Stijl: <input type="text" name="stijl" value="<?= $row['stijl']?>"><br>
        Alcohol: <input type="text" name="alcohol" value="<?= $row['alcohol']?>"><br>
        Brouwer: <input type="text" name="brouwcode" value="<?= $row['brouwernaam']?>"><br><br>
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>

         <!-- PHP code for the brouwers dropdown -->
        <?php
            dropDown("brouwer", GetBrouwer("brouwer"), $row["brouwernaam"]);
        ?>

        </form>
    </body>
</html>