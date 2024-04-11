<?php

require "../vendor/autoload.php";
use DiceGame\classes\Game;

session_start();

if ( ! isset( $_SESSION['throwcount'] ) ) {
	$_SESSION['throwcount'] = 0;
}

$game = new Game;
$game->startGame();

$game->exitGame();