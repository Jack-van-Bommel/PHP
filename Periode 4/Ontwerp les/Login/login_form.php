<!-- Login form page - Jack -->

<!-- Initialising -->
<?php
require_once "functions.php";
?>

<!-- HTML code -->
<html>
    <!-- Header -->
<header>
    <h1>PHP - PDO Login and Registration</h1>
    <hr/>
    <h2>Login here...</h2>
    <hr/>
</header>
<main>
<!-- Login form -->
<form method='POST' action='login_validate.php'>
    <label for='user'>Username</label>
    <input type='text' name='user' required>
    <br>

    <label for='pass'>Password</label>
    <input type='password' name='pass' required>
    <br>

    <input type='submit' name='submit_btn' value='Login'>
</form>

<a href="register_form.php">Registration</a>
</main>
</html>


<!-- PHP code -->
<?php



?>


