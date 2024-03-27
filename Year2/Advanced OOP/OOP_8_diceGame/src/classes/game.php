<?php

namespace DiceGame\classes;

use DiceGame\classes\Dice;

class Game {
	private Dice $dice;
	private int $throwcount;

	public function __construct() {
		$this->dice = new Dice;
		$this->throwcount = 0;
	}

	public function play() {
		$this->throwcount++;
		echo "Attempt " . $this->throwcount . ": ";
		for( $i = 0; $i < 6; $i++ ) {
			$this->dice->throwDice();
			echo $this->dice->getDiceSVG( $this->dice->getDiceValue() );
		} 
	}
}