<?php
// functie: Algemene functies tbv hergebruik
// Connect met database function
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

// print bieren overzicht function
function OvzBieren($db) {
    $query = $db->prepare("SELECT naam, alcohol FROM bier");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    echo "<table border=1 width=300>";
    echo "<th>Bieren</th> <th>Alcohol</th>";
    foreach ($result as &$data){
        echo "<tr><td>" . $data["naam"] . "</td>";
        echo "<td>" . $data["alcohol"] . "</td></tr>";
    }
    echo "</table>";
}

// Print brouwers overzicht function
function OvzBrouwers() {

}

// Function to print a html table
function PrintTable() {

}

?>