<!-- All PHP functions - Jack -->

<?php

function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "logindb";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Database connection has been made!<br>";
        return $conn;
     } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
     }
}

function matchData($data) {
    $conn = ConnectDb();

    $username = $data["username"];
    echo $username;
}



?>