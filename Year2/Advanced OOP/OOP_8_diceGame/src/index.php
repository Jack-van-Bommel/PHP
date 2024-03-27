<html>
	<form method="GET">
		<input type="submit" value="Throw Dice" name="rolldice">
	</form>
</html>

<?php

require "../vendor/autoload.php";

use DiceGame\classes\Game;

$game = new Game;

if ( isset( $_GET['rolldice'] ) ) {
	$game->play();
}

