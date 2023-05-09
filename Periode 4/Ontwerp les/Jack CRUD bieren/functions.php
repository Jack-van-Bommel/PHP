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
function GetData($table){
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

// Get specific bier data from biercode
function GetBier($biercode){
    // Database connection
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM bier WHERE biercode = $biercode");
    $query->execute();
    $result = $query->fetch();

    return $result;
}


// Start CRUD bieren on index.php
function CrudBieren(){
    // Haal alle bier data uit de database
    $result = GetData("bier");
    
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

        // Delete via linkje href
        // $table .= '<td><a href="delete_bier.php?biercode='.$row["biercode"].'">verwijder</a></td>';

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

// Dropdown for brouwer data instead of 
function dropDown($label, $data) {
    $txt = "
    <label for='cars'>Choose a car:</label>

    <select name='cars' id='cars'>
    <option value='volvo'>Volvo</option>
    <option value='saab'>Saab</option>
    <option value='mercedes'>Mercedes</option>
    <option value='audi'>Audi</option>
    </select>
    ";
    echo $txt;
}

?>