<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 7.3</title>
</head>
<body>
  
<form method="POST">
    <input type="radio" name="color" value="rood">
    <label for="color">Rood</label>

    <input type="radio" name="color" value="groen">
    <label for="color">Groen</label>

    <input type="radio" name="color" value="blauw">
    <label for="color">Blauw</label>

    <input type="radio" name="color" value="roze">
    <label for="color">Roze</label>

    <br>
    <br>

    <input type="submit" value="Instellen">
</form>

<style type="text/css">
    body {
        <?php
            switch($_POST["color"]){
                case "rood": echo "background-color: red;";
                break;
                case "groen": echo "background-color: green;";
                break;
                case "blauw": echo "background-color: blue;";
                break;
                case "roze": echo "background-color: pink;";
                break;
            }
        ?>
    }
</style>

</body>
</html>