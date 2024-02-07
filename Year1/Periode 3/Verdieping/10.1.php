<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random wachtwoord generator</title>
</head>
<body>
    
<?php
$passlength = 10;

function generatepass($passlength) {
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ12345667890";
    $alphlength = strlen($alphabet) - 1;

    $password = "";

    echo "Willekeurig wachtwoord van 10 tekens: "; 
    for ($i=0; $i<10; $i++) {
        $password = $alphabet[rand(0, $alphlength)];
        echo $password;
    }
}

generatepass($passlength);
?>

</body>
</html>