<!-- Store Userdata - Jack -->
<?php
require_once "functions.php";


// This starts chain reaction to sent data to database
if (isset($_POST)) {
    convertDataRegi();
}


// Convert $_POST to variable, then make post new login to db
function convertDataRegi() {
    $data = $_POST;
    senttodb($data);
}

// sent new login data to database
function senttodb($data) {
    $conn = ConnectDb();

    $username = $data["username"];
    $password = $data["password"];

    $query = $conn->prepare("INSERT INTO `login` (`username`, `password`) VALUES ('$username', '$password')");
    $query->execute();

    printNewLogin($data);
}

// Register_update print data function
function printNewLogin($data) {
    echo "Uw nieuwe account is aangemaakt met de gegevens hieronder: <br>";
    echo "Username: " . $data['username'] . "<br><br>";
    echo "Klik <a href='login_form.php'>hier</a> om terug te gaan naar de homepagina en daar in te loggen.";
}


?>