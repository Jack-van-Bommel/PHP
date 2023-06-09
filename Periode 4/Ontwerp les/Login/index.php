<!-- Homepage - Jack -->

<!-- HTML Code -->
<html>
    
<main>
    <h1>PHP - PDO Login and Registration</h1>
    <hr/>
    <h2>Welkom op de HOME-pagina!</h2>
    <br><br>
</main>

</html>

<!-- PHP Code -->
<?php

$templogin = 0;

if ($templogin == false) {
    echo "U bent niet ingelogd. Login om verder te gaan. <br>";
    echo "<a href='login_form.php'>Login</a>";
}
else if ($templogin == true) {
    echo "U bent ingelogd met de volgende gegevens:<br>";
    echo "Username: " . "username" . "<br>";
    echo "Password: " . "password" . "<br>";
    logout_btn();
}

function logout_btn() {
    echo "<a href=''>Logout</a>";
}

?>

