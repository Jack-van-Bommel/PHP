<?php

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


function getData() {
    $conn = ConnectDb();

    $query = $conn->prepare("SELECT * FROM brouwer");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function printtable() {
    $result = getData();
    $headers = array_keys($result[0]);

    $table = "<table border=1px>";
    $table .= "<tr>";
    foreach ($headers as $data) {
        $table .= "<th>$data</th>";
    }
    $table .= "</tr>";

    foreach ($result as $row) {
        $table .= "<tr>";

        foreach ($row as $cell) {
            $table .= "<td>$cell</td>";
        }

        $table .= "<td><input type='submit' value='Veranderen'></td>";
        $table .= "<td><input type='submit' value='Verwijderen'></td>";


        $table .= "</tr>";
    }


    $table .= "</table>";
    echo $table;

}


?>