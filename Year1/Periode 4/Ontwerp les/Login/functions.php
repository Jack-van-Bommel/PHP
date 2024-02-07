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


function checklogin() {
    if (isset($_SESSION['login'])) {
        indexloggedin();
    }
    else {
        echo "U bent niet ingelogd. Login om verder te gaan. <br><br>";
        echo "<a href='login_form.php'>Login</a>";
    }
}

// TEMP logout btn
function logout_btn() {
    echo "<a href='logout.php'>Logout</a>";
}

function indexloggedin() {
    echo "<h2>Het spel kan beginnen</h2> <br>";
    echo "U bent ingelogd met de volgende gegevens:<br>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "Password: " . $_SESSION['password'] . "<br>";
    logout_btn();
}


?>