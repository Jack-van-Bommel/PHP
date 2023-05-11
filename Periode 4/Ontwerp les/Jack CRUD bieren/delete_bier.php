<?php
// Delete bier from database
// Auteur: Jack


// We need this so we can use all the pre-made functions and data
require_once('functions.php');


// If we receive the biercode when we load this page is starts the deleting process
if (isset($_GET["biercode"])) {
    $row = GetBier($_GET["biercode"]);
    DeleteBier($row);
    
    // Uses JS to make an alert box, once OK is pressed it returns to the index page
    echo"<script type='text/javascript'>alert('Bier $row[naam] is verwijderd.');window.location.href='crud_bieren.php';</script>";
} else {
    echo "Biercode niet ontvangen";
}


?>