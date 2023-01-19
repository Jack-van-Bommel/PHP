<html>
<head>
    <title>Opdracht 4.5</title>
</head>
<body>
    <?php
    $number = 10;
    if ($number % 2 == 0){
        $response = "Ja";
    }
    else{
        $response = "Nee";
    }
    echo "Is het getal $number even? $response";
    ?>
</body>
</html>