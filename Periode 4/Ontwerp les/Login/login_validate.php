<!-- Validate login en Create loginsession -->
<?php
require_once "functions.php";

if(isset($_POST)) {
    $data = $_POST;
    checkdb($data);
}

function checkdb($data) {
    $conn = ConnectDb();

    $username = $data['user'];
    $password = $data['pass'];

    $sql = "SELECT * FROM `login` WHERE username = '$username'";
    $query = $conn->prepare($sql);
    $query->execute();

    $result = $query->fetch();
    validatelogin($result, $password);
}

function validatelogin($result, $password) {
    if ($result == False) {
        echo "Username/password incorrect, probeer het nog een keer <a href='login_form.php'>door hier te klikken.</a>";
    }
    else {
        matchpassword($result, $password);
    }
}

function matchpassword($result, $password) {
    if ($result['password'] == $password) {
        $_SESSION['login'] = True;
        $_SESSION['username'] = $result['username'];
        $_SESSION['password'] = $password;
        header('Location: index.php');
    }
    else {
        echo "Username/password incorrect, probeer het nog een keer <a href='login_form.php'>door hier te klikken.</a>";
    }
}


?>