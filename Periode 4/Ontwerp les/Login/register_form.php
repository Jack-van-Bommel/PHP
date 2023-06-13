<!-- Register user page - Jack -->
<!-- PHP Intialising -->
<?php
require_once("functions.php");
?>


<!-- HTML code -->
<html>
<header>
    <h1>PHP - PDO Login and Registration</h1>
    <hr/>
    <h2>Register here...</h2>
    <hr/><br>
</header>

<main>
    <form method="post" action='register_update.php'>
        <label for="username">Username: </label>
        <input type="text" name="username" required>
        <br>

        <label for="password">Password: </label>
        <input type="password" name="password" required>
        <br>

        <input type="submit" name="register_btn">
    </form>
</main>
</html>


<!-- PHP code -->
<?php


?>