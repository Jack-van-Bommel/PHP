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
    if (str_contains($data, "Chrome")) {
        $browser = "Google Chrome";
    }
    else {
        $browser = "Niet gevonden";
    }
    return $browser;
}

$systeem = besturingsysteem($data);
$browser = browsers($data);

echo "<br><br>";
echo "Internet browser: " . $browser . "<br>";
echo "Besturingssysteem: " . $systeem; 


// Saving data in database
function ConnectDb(){
    try {
        $db = new PDO("mysql:host=localhost;dbname=serverdata", "root", "");
        echo "<br><br>Connection to database succesful!";
    } 
    catch (PDOException $e){
        die("ERROR: " . $e->getMessage());
    }
    return $db;
}

function dbupdate($db, $systeem, $browser){
    $queryupdate = $db->prepare("INSERT INTO serverinformatie(browser, os) VALUES('$browser', '$systeem')");
    if ($queryupdate->execute()) {
       echo "<br>Data added to database";
    }
}

function countdata($db){
    $querycount = $db->prepare("SELECT browser, COUNT(*) AS aantal
                                FROM serverinformatie
                                GROUP BY browser
                                ORDER BY aantal DESC");
    $results = $querycount->execute();
    

}

$db = ConnectDb();
dbupdate($db, $systeem, $browser);
countdata($db);

?>

</body>
</html>