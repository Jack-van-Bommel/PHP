<html>
<head>
    <title>opdracht 4.3</title>
</head>
<body>
    <?php
    $getal1 = 15;
    $getal2 = 10;

    if ($getal1 > $getal2) {
        $sum = $getal1 * 2 + $getal2;
    }
    else if($getal1 < $getal2) {
        $sum = $getal2 * 2 + $getal1;
    }
    echo $sum;
    ?>
</body>
</html>