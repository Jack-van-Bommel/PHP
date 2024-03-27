<?php

namespace DiceGame\classes;

class Dice {
	const SIDES = 6;
	private int $diceValue;

	public function throwDice(): void {
		$this->diceValue = rand( 1, 6 );
	}

	public function getDiceValue(): int {
		return $this->diceValue;
	}

	public function getDiceSVG( int $DiceValue ): string {
		switch( $DiceValue) {
			case 1:
				return "<img src='./svg/dice_1.svg' height='100' width='100'>";
			case 2:
				return "<img src='./svg/dice_2.svg' height='100' width='100'>";
			case 3:
				return "<img src='./svg/dice_3.svg' height='100' width='100'>";
			case 4:
				return "<img src='./svg/dice_4.svg' height='100' width='100'>";
			case 5:
				return "<img src='./svg/dice_5.svg' height='100' width='100'>";
			case 6:
				return "<img src='./svg/dice_6.svg' height='100' width='100'>";
		}
		return "Dice image not found";
	}

}