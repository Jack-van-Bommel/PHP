<?php

namespace HouseRoom {
    class House 
    {
        private int $volume = 0;
        private array $rooms = array();

        public function addRroom( object $room ) {
            $this->rooms[] = $room;
        }

        public function getRooms(): array {
			return $this->rooms;
        }

        public function getTotalVolume(): int {
			foreach( $this->rooms as $room ) {
				$this->volume = $this->volume + $room->getVolume();
			}
			return $this->volume;
        }

        public function getPrice(): float {
			return $this->volume * 3000;
        }
    }

    class Room
    {
        private float $length;
        private float $width;
        private float $height;

        public function __construct( float $length, float $width, float $height ) {
            $this->length = $length;
            $this->width = $width;
            $this->height = $height;
        }
        
        public function getHeight(): float {
            return $this->height;
        }

        public function getWidth(): float {
            return $this->width;
        }

        public function getLength(): float {
            return $this->length;
        }

        public function getVolume(): int {
            return (int) round( $this->length * $this->width * $this->height );
        }
    }

	$room1 = new Room( 5.2, 5.1, 5.5 );
	$room2 = new Room( 4.8, 4.6, 4.9 );
	$room3 = new Room( 5.9, 2.5, 3.1 );

	$house = new House();
	$house->addRroom( $room1 );
	$house->addRroom( $room2 );
	$house->addRroom( $room3 );

	$houserooms = $house->getRooms();

	echo "Inhoud Kamers: <br><br>";
	echo "<ul>";
	foreach( $houserooms as $room ) {
		$length = $room->getLength();
		$width = $room->getWidth();
		$height = $room->getHeight();
		echo "<li>Lengte: {$length}m, Breedte: {$width}m, Hoogte: {$height}m</li><br>";
	}
	echo "</ul><br> Volume Totaal = {$house->getTotalVolume()}m3 <br>";
	echo "Prijs van het huis is = {$house->getPrice()} Euro";
}
