<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ontwerp lessen include voor functions gebruiken</title>
</head>
<body>
    
<?php
//Initialising
include "functions.php";

//main
$db = ConnectDb();

//print bieren
$result = Getbieren($db);
printbieren($result);

// printjemoeder($result); WIP universal print table
?>

</body>
</html>