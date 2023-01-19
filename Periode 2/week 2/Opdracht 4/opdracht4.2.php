<html>
<head>
    <title>opdracht 4.2</title>
</head>
<body>
    <?php
    $time = date("G");
    $dagdeel = match((int)$time) {
        0, 1, 2, 3, 4, 5 => "Het is nacht.",
        6, 7, 8, 9, 10, 11 => "Het is ochtend.",
        12, 13, 14, 15, 16, 17 => "Het is middag.",
        18, 19, 20, 21, 22, 23 => "Het is avond.",
        default => "Error",
    };
    echo $dagdeel;
    ?>
</body>
</html>