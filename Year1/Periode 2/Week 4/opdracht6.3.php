<html>
    <body>
        <?php
        $postcodegetal = rand(1000, 9999);
        $postcodeletter = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

        $shuffle = shuffle($postcodeletter);

        echo "Een willekeurige postcode is: " . $postcodegetal . " " . $postcodeletter[0] . $postcodeletter[1];

        ?>
    </body>
</html>