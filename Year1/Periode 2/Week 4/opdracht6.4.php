<html>
    <body>
        <?php
        $straal = 5;

        // opp = pi x straal2
        // omt = pi x diameter

        function oppervlakte($straal){
            $oppervlakte = pi() * pow($straal, 2);
            $answer1 = round($oppervlakte, 1);
            return $answer1;
        }
        function omtrek($straal){
            $diameter = $straal * 2;
            $omtrek = pi() * $diameter;
            $answer1 = round($omtrek, 1);
            return $answer1;
        }

        echo "De omtrek van een cirkel met straal 5 is: " . omtrek($straal);
        echo "<br>";
        echo "De oppervlakte van een cirkel met straal 5 is: " . oppervlakte($straal);

        ?>
    </body>
</html>