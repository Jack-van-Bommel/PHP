<html>
<head>
    <title>opdracht 4.4</title>
</head>
<body>
    <?php
    $oldprice = 1;

    if ($oldprice >= 150) {
        $oldpricepercent = $oldprice / 100;
        $newprice = $oldpricepercent * 19 + $oldprice;
        echo "Oude prijs: € $oldprice. ";
        echo "Na verhoging van 19% is de prijs: € $newprice.";
    }
    else if ($oldprice > 55) {
        $oldpricepercent = $oldprice / 100;
        $newprice = $oldpricepercent * 11 + $oldprice;
        echo "Oude prijs: € $oldprice. ";
        echo "Na verhoging van 11% is de prijs: € $newprice.";
    }
    else {
        $oldpricepercent = $oldprice / 100;
        $newprice = $oldpricepercent * 16 + $oldprice;
        echo "Oude prijs: € $oldprice. ";
        echo "Na verhoging van 16% is de prijs: € $newprice.";
    }
    ?>
</body>
</html>