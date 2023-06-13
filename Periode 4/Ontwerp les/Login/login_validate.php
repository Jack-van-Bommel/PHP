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
    validatelogin($result);
}

function validatelogin($result) {
    if ($result == False) {
        $_SESSION["loginattempt"] = 1;
        header("location: login_form.php");
    } else {
        echo "Login unsure";
    }
}

?>