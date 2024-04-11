<?php

namespace DiceGame\classes;

use DiceGame\classes\Dice;

class Game {
	private Dice $dice;
	private int $totalpoints = 0;

	public function __construct() {
		$this->dice = new Dice;
	}

	public function startGame() {
		if( ! isset( $_SESSION['throwcount'] ) ) {
			echo "<form method='POST'>";
				echo "<input type='submit' name='Start Game' value='startbtn'>";
			echo "</form>";
		}
		if( isset( $_POST['startbtn'] ) ) {
			$this->play();
		}

		if( isset( $_SESSION['throwcount'] ) && $_SESSION['throwcount'] < 4 ) {
			echo "<form method='GET'>";
			echo "<input type='submit' value='Roll Dice' name='rolldicebtn'>";
			echo "</form>";
		}
		if( isset( $_GET['rolldicebtn'] ) ) {
			$_SESSION['throwcount']++; 
			$this->play();
		}
	}

	public function play() {
		$this->getPreviousRounds();

		switch( $_SESSION['throwcount'] ) {
			case 1:
				$_SESSION['round1'] = array();
				$_SESSION['round1total'] = 0;
				break;
			case 2:
				$_SESSION['round2'] = array();
				$_SESSION['round2total'] = 0;
				break;
			case 3:
				$_SESSION['round3'] = array();
				$_SESSION['round3total'] = 0;
				break;
			default:
				$this->endOfGame();
				exit();
		}

		echo "Attempt " . $_SESSION['throwcount'] . ": ";
		for( $i = 0; $i < 6; $i++ ) {
			$this->dice->throwDice();
			$this->totalpoints = $this->totalpoints + $this->dice->getDiceValue();
			echo $this->dice->getDiceSVG( $this->dice->getDiceValue() );

			switch( $_SESSION['throwcount'] ) {
				case 1:
					$_SESSION['round1'][] = $this->dice->getDiceValue();
					break;
				case 2:
					$_SESSION['round2'][] = $this->dice->getDiceValue();
					break;
				case 3:
					$_SESSION['round3'][] = $this->dice->getDiceValue();
					break;
			}
		}
		echo " Total score: $this->totalpoints";

		switch( $_SESSION['throwcount'] ) {
			case 1:
				$_SESSION['round1total'] = $this->totalpoints;
				break;
			case 2:
				$_SESSION['round2total'] = $this->totalpoints;
				break;
			case 3:
				$_SESSION['round3total'] = $this->totalpoints;
				break;
		}
	}

	public function getPreviousRounds() {
		if( isset( $_SESSION['round1'] ) ) {
			echo "Attempt 1: ";
			foreach( $_SESSION['round1'] as $round1Dices ) {
				echo $this->dice->getDiceSVG( $round1Dices );
			}
			echo " Total score: " . $_SESSION['round1total'];
			echo "<br>";
		}
		if( isset( $_SESSION['round2'] ) ) {
			echo "Attempt 2: ";
			foreach( $_SESSION['round2'] as $round2Dices ) {
				echo $this->dice->getDiceSVG( $round2Dices );
			}
			echo " Total score: " . $_SESSION['round2total'];
			echo "<br>";
		}
		if( isset( $_SESSION['round3'] ) ) {
			echo "Attempt 3: ";
			foreach( $_SESSION['round3'] as $round3Dices ) {
				echo $this->dice->getDiceSVG( $round3Dices );
			}
			echo " Total score: " . $_SESSION['round3total'];
			echo "<br>";
		}
	}

	public function endOfGame() {
		echo "End of game.";
		echo "<table>";
			echo "<th>Round 1</th>";
			echo "<th>Round 2</th>";
			echo "<th>Round 3</th>";
			echo "<tr>";
				echo "<td>" . $_SESSION['round1total'] . "</td>";
				echo "<td>" . $_SESSION['round2total'] . "</td>";
				echo "<td>" . $_SESSION['round3total'] . "</td>";
			echo "</tr>";
		echo "</table>";

		echo "<form method='POST'>";
			echo "<input type='submit' name='Start another game' value='startagain'>";
		echo "</form>";

		if ( isset( $_POST['startagain'] ) ) {
			$this->exitGame();
		}
	}

	public function exitGame() {
		echo "<form method='POST'>";
			echo "<input type='submit' value='Exit Game' name='exitbtn'>";
		echo "</form>";

		if( isset( $_POST['exitbtn'] ) ) {
			session_unset();
			session_destroy();
			header( "Location: index.php" );
		}
	}
}