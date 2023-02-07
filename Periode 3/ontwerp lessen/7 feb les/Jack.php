<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Github test</title>
</head>
<body>
<header>
        <h1>Github test voor project 03</h1>
        <h2>Deze pagina is gemaakt door Jack</h2>
        <?php
        include "menu.php"; ?>
</header>

<main>
    <?php
        date_default_timezone_set("Europe/Amsterdam");
        echo "De datum van vandaag is ", date("d F o."), "<br>";
    ?>

    <h2>HTML Forms</h2>

    <form action="action_page_Jack.php" method="POST">
    <label for="username">Type your username:</label><br>
    <input type="text" id="username" name="username" Placeholder="Username"><br>
    <label for="password">Type your password:</label><br>
    <input type="password" id="password" name="password" placeholder="Password"><br><br>
    <input type="submit" value="Submit">
    </form> 

    <p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</main>

</body>
</html>