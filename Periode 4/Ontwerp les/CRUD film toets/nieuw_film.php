<!-- Nieuw filmpie toevoegen aan de database -->
<!-- Auteur: Jack -->

<?php
require_once("functions.php");

?>

<!-- HTML code for the form -->
<html>
    <h1>Nieuw Filmpie toevoegen</h1>
    <br>

    <p>Filmid wordt automatisch gegenereerd!</p>
    <br>
    
    <form method='POST'>
    <label for='name'>Filmnaam: </label>
    <input type='' name='naam'>
    <br>

    <label for='genreid'>Genreid: </label>
    <input type='' name='genreid'>
    <br>

    <label for='releasejaar'>Releasejaar: </label>
    <input type='' name='releasejaar'>
    <br>

    <label for='regisseur'>Regisseur: </label>
    <input type='' name='regisseur'>
    <br>

    <label for='landherkomst'>Landherkomst: </label>
    <input type='' name='landherkomst'>
    <br>

    <label for='duur'>Duur: </label>
    <input type='' name='duur'>
    <br>

    <input type='submit' name='toevoeg_btn' value='Toevoegen'>
    </form>
</html>


<?php

if (isset($_POST['toevoeg_btn'])) {
    sentdata();
}


?>