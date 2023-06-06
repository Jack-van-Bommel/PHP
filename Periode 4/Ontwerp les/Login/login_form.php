<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<!-- HTML code -->
<header>
    <h1>PHP - PDO Login and Registration</h1>
    <hr/>
    <h2>Login here...</h2>
    <hr/>
</header>
<main>
<!-- Login form -->
<form method='POST'>
    <label for='user'>Username</label>
    <input type='text' name='user'>
    <br>

    <label for='pass'>Password</label>
    <input type='password' name='pass'>
    <br>

    <input type='submit' name='submit_btn'>
    <br>
</form>

<a href='register_form.php'>Registration</a>

</main>


<!-- PHP code -->
<?php

?>

</body>
</html>