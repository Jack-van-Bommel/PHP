<?php

namespace Houses {
    class House {
        private int $floors;
        private int $rooms;
        private float $width;
        private float $height;
        private float $depth;
        private int $volume;

        public function __construct( int $floors, int $rooms, float $width, float $height, float $depth ) {
            $this->floors = $floors;
            $this->rooms = $rooms;
            $this->width = $width;
            $this->height = $height;
            $this->depth = $depth;
            $this->setVolume( $this->width, $this->height, $this->depth );
        }

        public function setVolume( float $width, float $height, float $depth ): void {
            $this->volume = round( $width * $height * $depth );
        }

        public function getHouse(): string {
            return "Dit huis heeft {$this->floors} verdiepingen, {$this->rooms} kamer en heeft een volume van {$this->volume} m3 <br>";
        }

        public function getPrice(): string {
            $price = 1500 * $this->volume;
            return "De prijs van het huis is: {$price} <br>";
        }
    }

    $house_1 = new House( 2, 4, 4, 2, 5 );
    echo $house_1->getHouse();
    echo $house_1->getPrice();
}