<html>
<head>
    <title>Opdracht 4.6</title>
</head>
<body>
    <?php
    $uur = date("G");
    $temperatuur = 26;
    $luchtvochtigheid = 84;

    if ($uur >= 17){
        $response = "uit";
    }
    else if($temperatuur < 20 AND $luchtvochtigheid < 85){
        $response = "uit";
    }
    else{
        $response = "aan";
    }
    echo "De airco staat: $response.";
    ?>
</body>
</html>