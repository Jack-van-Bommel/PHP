<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $y = 0;
    switch ($x) {
        case 1: $y += 5;
        break;
        case 2: $y += 10;
        break;
        case 3: $y += 15;
        break;
        case 4: $y += 20;
        break;
        case 5: $y += 25;
    }
    echo $y;
    ?>
</body>
</html>