<html>
<head>
    <title></title>
</head>
<body>
    <?php
        date_default_timezone_set("Europe/Amsterdam");
        $today = date("l j F Y");
        echo "Het is vandaag: $today";
        echo "<br>";

        $daynum = date("z");
        echo "Vandaag is het de ${daynum}e dag van het jaar.";
        echo "<br>";

        $day = date("l");
        $numofweek = date("d");
        echo "$day is de ${numofweek}e dag van de week.";
        echo "<br>";

        $month = date("F");
        $totaldaysofmonth = date("t");
        echo "De maand $month heeft in totaal $totaldaysofmonth dagen.";
        echo "<br>";

        $leapyear = date("L");
        $year = date("Y");
        if($leapyear == "0") {
            echo "Het jaar $year is geen schrikkeljaar.";
        }
        else {
            echo "Het jaar $year is een schrikkeljaar.";
        }
    ?>
</body>
</html>