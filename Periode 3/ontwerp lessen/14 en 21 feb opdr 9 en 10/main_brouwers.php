<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 10, main brouwers</title>
</head>
<body>
    
<?php
include "functions.php";

$db = Connectdb();

$result = OvzBrouwers($db);

PrintTable($result);


?>

</body>
</html>