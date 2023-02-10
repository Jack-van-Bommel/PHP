<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 13: h9 vraag 5</title>
</head>
<body>
    
<form METHOD="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username">
<br>
    <label for="password">Password:</label>
    <input type="password" name="password">
<br>
    <input type="submit" name="inloggen" value="Inloggen">
</form>


<?php
session_start();

try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
    if(isset($_POST["inloggen"])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = $_POST["password"];
        $query = $db->prepare("SELECT * FROM gebruikers WHERE username = :user");
        $query->bindParam("user", $username);
        $query->execute();

        if($query->rowCount() == 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $result["password"])) {
                echo "Juiste gegevens!";
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;
                header('Location: beveiligdepagina.php');
            } else {
                echo "Wachtwoord fout!";
                unset($_SESSION["username"]);
            }
        } else {
            echo "Gebruikersnaam fout!";
            unset($_SESSION["username"]);
        }
        echo "<br>";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>

</body>
</html>