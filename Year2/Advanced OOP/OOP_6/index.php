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

    require_once 'classes/user.php';

    $user = new User();

	// Activeer de session
	session_start();

	/**
	 * Mijn session variables worden gedelete wanneer ik terug keer naar index.php bij succesvol inloggen
	 * en heb geen motivatie meer om het op te lossen.
	 * 
	 * Ik zou het willen fixen, maar in de wijze woorden van Laszlo Cravensworth:
	 * "I can't be fucked."
	 */

	// Alert not login
	echo "U bent niet ingelogd. Login in om verder te gaan.<br><br>";
	// Toon login button
	echo '<a href = "login_form.php">Login</a>';

	?>

</body>
</html>