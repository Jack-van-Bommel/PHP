<!-- Nieuw biertje toevoegen aan de database -->
<!-- Auteur: Jack -->

<?php
require_once("functions.php");

?>

<!-- HTML code for the form -->
<html>
    <h1>Nieuw biertje toevoegen</h1>
    <br>

    <p>Biercode wordt automatisch gegenereerd!</p>
    <br>
    
    <form method='POST'>
    <label for='name'>Naam: </label>
    <input type='' name='naam'>
    <br>

    <label for='soort'>Soort: </label>
    <input type='' name='soort'>
    <br>

    <label for='stijl'>Stijl: </label>
    <input type='' name='stijl'>
    <br>

    <label for='alcohol'>Alcohol percentage: </label>
    <input type='' name='alcohol'><br>

    <?php dropDown2("brouwcode", GetData("brouwer")); ?><br><br>

    <input type='submit' name='toevoeg_btn' value='Toevoegen'>
    </form>
</html>


<?php

if (isset($_POST['toevoeg_btn'])) {
    sentdata();
}


?>