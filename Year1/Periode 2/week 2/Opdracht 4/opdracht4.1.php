<html>
<head>
    <title>opdracht 4.1</title>
</head>
<body>
    <?php
    date_default_timezone_set("Europe/Amsterdam");
    $time = date("G");
    
    if ($time >= 6 and $time < 12){
        echo "Het is ochtend.";
    }
    else if ($time >= 12 and $time < 18){
        echo "Het is middag.";
    }
    else if ($time >= 18 and $time < 23){
        echo "Het is avond.";
    }
    else if ($time >= 0 and $time < 6){
        echo "Het is nacht.";
    }
    ?>
</body>
</html>