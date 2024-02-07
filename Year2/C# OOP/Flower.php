<?php

class Flower {
	private string $color;
	private string $name;

	public function __construct( string $color, string $name ) {
		$this->color = $color;
		$this->name = $name;
	}
}

$flower_1 = new Flower( 'paars/geel', 'Zonnebloem' );
$flower_2 = new Flower( 'roze', 'Paardebloem' );

var_dump( $flower_1, '<br>' );
var_dump( $flower_2, '<br><br>' );

$flower_1->color = 'geel';
var_dump( $flower_1, '<br>' );