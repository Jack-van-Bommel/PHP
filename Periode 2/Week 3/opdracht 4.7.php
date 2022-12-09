<hhtml>
<head>
    <title>Opdracht 4.7</title>
</head>
<body>
    <?php
    $spaargeld = 1025;
    $iphone = 1000;
    if ($spaargeld < 750){
        $tekort = 1000 - $spaargeld;
        echo "Je spaargeld is nu: $spaargeld euro. Je komt dus nog $tekort euro tekort, je kan beter nog even een baantje gaan zoeken.";
    }
    else if($spaargeld < 1000 AND $spaargeld >= 750){
        $tekort = 1000 - $spaargeld;
        echo "Je spaargeld is nu: $spaargeld euro. Je bent er bijna, maar je moet nog $tekort euro sparen voordat je er bent!";
    }
    else if($spaargeld >= 1000){
        $tekort = $spaargeld - 1000;
        echo "Je spaargeld is nu: $spaargeld euro. Hiermee is het mogelijk om een Iphone te kopen. Ook heb je nog $tekort euro over voor een hoesje!.";
    }   
    ?>
</body>
</hhtml>