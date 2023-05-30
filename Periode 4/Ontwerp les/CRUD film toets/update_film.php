<?php
// Update film in the database
// Auteur: Jack

    // Initialising
    echo "<h1>Update Film</h1>";
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_wzg'])){
        UpdateFilm($_POST);
    }

    // Test if we have the filmid
    if(isset($_GET['filmid'])){  
        echo "<br>Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende filmid $_GET['filmid']
        $filmid = $_GET['filmid'];
        $row = GetFilm($filmid);
    }
    
   ?>

<!-- HTML code for the form -->
<html>
    <body>
        <form method="post">
        <br>
        Filmid: <input type="" name="filmid" value="<?php echo $row['filmid'];?>"><br>
        Filmnaam: <input type="" name="filmnaam" value="<?php echo $row['filmnaam'];?>"><br> 
        Genreid: <input type="text" name="genreid" value="<?= $row['genreid']?>"><br>
        Releasejaar: <input type="text" name="releasejaar" value="<?= $row['releasejaar']?>"><br>
        Regisseur: <input type="text" name="regisseur" value="<?= $row['regisseur']?>"><br>
        Landherkomst: <input type="text" name="landherkomst" value="<?= $row['landherkomst']?>"><br>
        Duur: <input type="text" name="duur" value="<?= $row['duur']?>">
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
    </body>
</html>