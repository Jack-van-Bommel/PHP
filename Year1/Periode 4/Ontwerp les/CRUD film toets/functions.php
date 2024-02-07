<?php
// All functions for the CRUD film toets
// Auteur: Jack

// Connect to database function
function ConnectDb(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3dplus";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $conn;
 } 
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
 }
}


// Important functions under here
//  Get all data from a database
function GetCrudData(){
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM film");

    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

// Get specific film data from filmid
function GetFilm($filmid){
    // Database connection
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT filmid, filmnaam, genreid, releasejaar, regisseur, landherkomst, duur FROM film WHERE filmid = $filmid");

    $query->execute();
    $result = $query->fetch();

    return $result;
}


// Start CRUD bieren on index.php
function CrudFilm(){
    
    $nav = "<h1>CRUD film - Jack</h1>";
    $nav .= "<a href='nieuw_film.php'>Nieuw filmpie toevoegen</a>";

    echo $nav;

    // Haal alle film data uit de database
    $result = GetCrudData();
    
    //print table met de data van de database
    PrintCrudFilm($result);
}

// Print CRUD with data from database
function PrintCrudFilm($result){
    $table = "<table border = 1px>";

    // Print header table
    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='update_film.php?filmid=$row[filmid]' >       
                    <button name='wzg'>Wijzigen</button>	 
            </form>" . "</td>";
        
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}

// update bier database functions
function UpdateFilm($row){
    echo "Data is geupdate<br>";

    try {
        $conn = ConnectDb();


        $sql = "UPDATE film
        SET
            filmnaam = '$row[filmnaam]',
            genreid = '$row[genreid]',
            releasejaar = '$row[releasejaar]',
            regisseur = '$row[regisseur]',
            landherkomst = '$row[landherkomst]',
            duur = '$row[duur]'
        WHERE filmid = $row[filmid]";

        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        echo "ERROR: " . $e->getmessage();
    }
}

// Adds new films to the database
function sentdata() {
    $conn = connectdb();

    $filmnaam = $_POST["naam"];
    $genreid = $_POST["genreid"];
    $releasejaar = $_POST["releasejaar"];
    $regisseur = $_POST["regisseur"];
    $landherkomst = $_POST["landherkomst"];
    $duur = $_POST["duur"];


    $sql = "INSERT INTO `film` (`filmid`, `filmnaam`, `genreid`, `releasejaar`, `regisseur`, `landherkomst`, `duur`) VALUES (NULL, '$filmnaam', '$genreid', '$releasejaar', '$regisseur', '$landherkomst',  '$duur')";
    $query = $conn->prepare($sql);
    $query->execute();

    echo "Nieuw filmpie genaamd $_POST[naam] is toegevoegd aan de database! <br>";
    echo "<a href='index.php'>Keer terug naar CRUD films</a>";
}




?>