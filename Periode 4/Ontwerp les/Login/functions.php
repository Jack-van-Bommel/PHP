<!-- All PHP functions - Jack -->

<?php
// Start session
session_start();

// Basic database connection function, used to create $conn
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "logindb";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // echo "Database connection has been made!<br>";
        return $conn;
     } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
     }
}

// TEMP session login function
function templogin() {
    $_SESSION["login"] = 0;

    if ($_SESSION["login"] == false) {
        echo "U bent niet ingelogd. Login om verder te gaan. <br>";
        echo "<a href='login_form.php'>Login</a>";
    }
    else if ($_SESSION["login"] == true) {
        echo "U bent ingelogd met de volgende gegevens:<br>";
        echo "Username: " . "username" . "<br>";
        echo "Password: " . "password" . "<br>";
        logout_btn();
    }
}

// TEMP logout btn
function logout_btn() {
    echo "<a href=''>Logout</a>";
}


?>