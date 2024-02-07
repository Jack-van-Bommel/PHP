<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10.5 php uitbreiding poll</title>
</head>
<body>
    
<?php

function connectdb(){
    try {
        $db = new PDO("mysql:host=localhost;dbname=polls", "root", "");
        $queryread = $db->prepare("SELECT * FROM optie");
        $queryread->execute();    
        $result = $queryread->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }
    catch (PDOException $e) {
        die("Error: " . $e->getmessage());
    }
}

function calculatetotal($result) {
    $optie1 = $result[0]["stemmen"];
    $optie2 = $result[1]["stemmen"];
    $optie3 = $result[2]["stemmen"];
    $optie4 = $result[3]["stemmen"];
    $total = $optie1 + $optie2 + $optie3 + $optie4;
    return $total;
}

function calculatepercentage($result, $total) {
    $optie1 = $result[0]["stemmen"];
    $optie2 = $result[1]["stemmen"];
    $optie3 = $result[2]["stemmen"];
    $optie4 = $result[3]["stemmen"];
    
    // Formula = klein getal / total x 100 = percentage
    $calc1 = $optie1 / $total * 100;
    $percent1 = round($calc1, 2) . "%";
    $calc2 = $optie2 / $total * 100;
    $percent2 = round($calc2, 2) . "%";
    $calc3 = $optie3 / $total * 100;
    $percent3 = round($calc3, 2) . "%";
    $calc4 = $optie4 / $total * 100;
    $percent4 = round($calc4, 2) . "%";

    $percent = array($percent1, $percent2, $percent3, $percent4);
    return $percent;
}

function printtable($result, $total, $percent) {
    $table = "<table border=1px>";

    $table .= "<tr><th>" . "Stelling van de maand: 'PHP is de leukste programmertaal'" . "</th></tr>";
    $table .= "<tr><td>" . "Aantal uitgebrachte stemmen: " . $total . "</td></tr>";
    

    foreach ($result as $data) {
        $table .= "<tr>";
        $table .= "<td>" . $data["optie"] . "</td>";
        $table .= "<td>" . $data["stemmen"] . "</td>";
    }
    foreach ($result as $cell) {
        $table .= "</tr>";
    }

    echo $table;
}


$result = connectdb();
$total = calculatetotal($result);
$percent = calculatepercentage($result, $total);
printtable($result, $total, $percent);



?>

</body>
</html>