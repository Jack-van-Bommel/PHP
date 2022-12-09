<html>
<head>
    <title>Opdracht 4.8</title>
</head>
<body>
    <?php
    $leeftijd = 20;
    $stempas = false;
    if($leeftijd >= 16){
        echo "Je mag praktijkexamen voor je scooterrijbewijs doen.";
    }
    else if($leeftijd > 16){
        echo "Je mag nog niet je praktijkexamen voor je scooterrijbewijs doen.";
    }

    echo "<br>";

    if($leeftijd >= 18){
        if($stempas == true){
            echo "Je mag stemmen, want je bent 18 en hebt een stempas";
        }
        else{
            echo "Je mag niet stemmen, want je hebt geen stempas";
        }
    }
    else{
        echo "Je mag nog niet stemmen, want je bent geen 18.";
    }
    ?>
</body>
</html>