<?php
// All functions for the CRUD bieren
// Auteur: Jack

// Connect to database function
function ConnectDb(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bieren";

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
    $query = $conn->prepare("SELECT bier.biercode, bier.naam AS 'biernaam', bier.soort, bier.stijl, bier.alcohol, brouwer.naam AS 'brouwernaam' 
                            FROM bier 
                            INNER JOIN brouwer ON bier.brouwcode = brouwer.brouwcode");

    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

// Get brouwer data
function GetBrouwer($table){
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT brouwcode, naam AS 'brouwernaam', land FROM $table");

    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

// Get specific bier data from biercode
function GetBier($biercode){
    // Database connection
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT bier.biercode, bier.naam AS 'biernaam', bier.soort, bier.stijl, bier.alcohol, brouwer.naam AS 'brouwernaam' 
                            FROM bier 
                            INNER JOIN brouwer ON bier.brouwcode = brouwer.brouwcode   
                            WHERE biercode = $biercode");

    $query->execute();
    $result = $query->fetch();

    return $result;
}


// Start CRUD bieren on index.php
function CrudBieren(){
    
    $nav = "<h1>CRUD bieren</h1>";
    $nav .= "<a href='nieuw_bier.php'>Nieuw biertje toevoegen</a>";

    echo $nav;

    // Haal alle bier data uit de database
    $result = GetCrudData();
    
    //print table met de data van de database
    PrintCrudBier($result);
}

// Print CRUD with data from database
function PrintCrudBier($result){
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
            "<form method='post' action='update_bier.php?biercode=$row[biercode]' >       
                    <button name='wzg'>Wijzigen</button>	 
            </form>" . "</td>";


        // Delete via $_POST
        $table .= "<td>". 
        "<form method='post'>       
                <button name='del' value='$row[biercode]'>Verwijderen</button>	 
        </form>" . "</td>";
        
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}

// update bier database functions
function UpdateBier($row){
    echo "Update row<br>";

    try {
        $conn = ConnectDb();


        $sql = "UPDATE bier
        SET
            naam = '$row[naam]',
            soort = '$row[soort]',
            stijl = '$row[stijl]',
            alcohol = '$row[alcohol]',
            brouwcode = '$row[brouwcode]'
        WHERE biercode = $row[biercode]";

        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        echo "ERROR: " . $e->getmessage();
    }
}

// Delete bier function
function DeleteBier($row) {
    try {
        $conn = ConnectDb();

        $sql = "DELETE FROM bier WHERE `bier`.`biercode` = $row[biercode]";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    catch (PDOException $e) {
        die("ERROR: " . $e->getmessage());
    }
}

// Delete bier safer version using $_POST
if (isset($_POST["del"])) {
    $biercode = $_POST["del"];
    $row = GetBier($biercode);
    DeleteBier($row);

    echo"<script type='text/javascript'>alert('Bier verwijdert: $row[naam]');</script>";
}

// Dropdown for brouwers on the bier change page
function dropDown($label, $data, $row_selected) {
    $txt = "
    <label for='$label'>Choose a $label:</label>
        <select name='$label' id='$label'>";

    foreach($data as $row) {
        if ($row['brouwernaam'] == $row_selected){
            $txt .= "<option value='$row[brouwernaam]' selected='selected'>$row[brouwernaam]</option>\n";
        } 
        else {
           $txt .= "<option value='$row[brouwernaam]'>$row[brouwernaam]</option>\n";
        }
    }

    $txt .= "</select>";
    echo $txt;
}

// Dropdown for brouwers on the add new bier page
function dropDown2($label, $data) {
    $txt = "
    <label for='$label'>Choose a $label:</label>
        <select name='$label' id='$label'>";

    foreach($data as $row) {
        $txt .= "<option value='$row[brouwernaam]'>$row[biernaam]</option>\n";
    }

    $txt .= "</select>";
    echo $txt;
}

// Adds new bier to the database
function sentdata() {
    $conn = connectdb();

    $naam = $_POST["naam"];
    $soort = $_POST["soort"];
    $stijl = $_POST["stijl"];
    $alcohol = $_POST["alcohol"];
    $brouwer = $_POST["brouwcode"];


    $sql = "INSERT INTO `bier` (`biercode`, `naam`, `soort`, `stijl`, `alcohol`, `brouwcode`) VALUES (NULL, '$naam', '$soort', '$stijl', '$alcohol', '$brouwer')";
    $query = $conn->prepare($sql);
    $query->execute();

    echo "Nieuw biertje genaamd $_POST[naam] is toegevoegd aan de database! <br>";
    echo "<a href='index.php'>Keer terug naar CRUD bieren</a>";
}




?>