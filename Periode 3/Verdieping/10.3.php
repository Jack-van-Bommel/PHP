<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filteren server data</title>
</head>
<body>

<?php

$data = $_SERVER["HTTP_USER_AGENT"];
echo $data;

function besturingsysteem($data) {
    if (str_contains($data, "Windows NT 10.0")) {
        $systeem = "Windows 10";
    }
    else {
        $systeem = "Niet gevonden";
    }
    return $systeem;
}

function browsers($data) {
    if(str_contains($data, "Chrome") && str_contains($data, "Edg")) {
        $browser = "Microsoft Edge";
    }
    else if(str_contains($data, "Chrome")) {
        $browser = "Google Chrome";
    }
    else {
        $browser = "Niet gevonden";
    }
    return $browser;
}

function connectdb($systeem, $browser){
    try{
        $db = new PDO("mysql:host=localhost;dbname=serverdata", "root", "");
        $queryupdate = $db->prepare("INSERT INTO info(browser, os) VALUES ('$browser', '$systeem')");
        $queryupdate->execute();
        echo "<br><br>Data sent to database";
        return $db;
    }
    catch (PDOException $e) {
        die("ERROR: " . $e->getmessage());
    }
}

function getdata(){
    try{
        $db = new PDO("mysql:host=localhost;dbname=serverdata", "root", "");
        $queryread = $db->prepare("SELECT browser, COUNT(*) AS aantal FROM info GROUP BY browser ORDER BY aantal DESC");
        $queryread->execute();
        $result = $queryread->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    } 
    catch (PDOException $e) {
        die("ERROR: " . $e->getmessage());
    }
}

function printdata($result){
    echo "<table border=1px> <tr>";
    echo "<th>Webbrowser</th><th>Bezoeken</th></tr>";
    foreach ($result as $data) {
        echo "<tr><td>";
        echo $data["browser"];
        echo "</td><td>";
        echo $data["aantal"];
        echo "</td></tr>";
    }
    echo "</table>";
}

$systeem = besturingsysteem($data);
$browser = browsers($data);

echo "<br><br>";
echo "Internet browser: " . $browser . "<br>";
echo "Besturingssysteem: " . $systeem; 

connectdb($systeem, $browser);
$result = getdata();
printdata($result);


?>

</body>
</html>