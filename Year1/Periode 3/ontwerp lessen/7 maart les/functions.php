<?php
// functie: Algemene functies tbv hergebruik

// Connect met database bieren function
function ConnectDb() {
    $dbname = "bieren";
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e){
        die("Error: " . $e->getMessage());
    } 
}

// function to get beer results from database
function Getbieren($db) {
    $querybier = $db->prepare("SELECT biercode, naam, soort, stijl, alcohol, brouwcode FROM bier");
    $querybier->execute();
    $result = $querybier->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

// Function to print beers in a table
function Printbieren($result) {
    $wijzigbtn = "<td><input type='submit' value='Wijzig' name='wijzig_btn'></td>";
    $verwijderbtn = "<td><input type='submit' value='Verwijderen' name='verwijder_btn'></td>";

    echo "<a href='#'>Toevoegen</a>";

    echo "<table border=1>";
    echo "<th>Biercode</th> <th>Biernaam</th> <th>Soort</th> <th>Stijl</th> <th>Alcohol</th> <th>Brouwcode</th>";

    foreach ($result as &$data){
        echo "<tr><td>" . $data["biercode"] . "</td>";
        echo "<td>" . $data["naam"] . "</td>";
        echo "<td>" . $data["soort"] . "</td>";
        echo "<td>" . $data["stijl"] . "</td>";
        echo "<td>" . $data["alcohol"] . "</td>";
        echo "<td>" . $data["brouwcode"] . "</td>";
        echo "<form method='POST'>";
        echo $wijzigbtn;
        echo $verwijderbtn;
        echo "</form>";
        echo "</tr>";
    }
    echo "</table>";
}

// Print brouwers overzicht function
function OvzBrouwers($db) {
    $querybrouwer = $db->prepare("SELECT brouwcode, naam, land FROM brouwer");
    $querybrouwer->execute();
    $result = $querybrouwer->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}
?>