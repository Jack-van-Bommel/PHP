<?php
    // Functie: programma login OOP 
    // Auteur: Wigmans, Edited by Jack

    // Initialisatie
?>

<!DOCTYPE html>
<html lang="en">
<body>

	<h3>PDO Login and Registration</h3>
	<hr/>

	<h3>Welcome op de HOME-pagina!</h3>
	<br />
	<?php

	require "../vendor/autoload.php";
	use LoginOpdracht\classes\User;

    $user = new User();

	// Activeer de session
	session_start();

	// Alert not login
	echo "U bent niet ingelogd. Login in om verder te gaan.<br><br>";
	// Toon login button
	echo '<a href = "login_form.php">Login</a>';

	?>

</body>
</html>