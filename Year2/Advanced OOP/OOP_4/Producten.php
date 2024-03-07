<?php

namespace Producten {
	abstract class Product {
		private string $name;
		private float $purchasePrice;
		private int $tax;
		private string $description;
		private float $profit;
		protected string $category;

		public function __construct( 
			string $name, 
			float $purchasePrice, 
			int $tax, 
			string $description, 
			float $profit 
			) {
			$this->name = $name;
			$this->purchasePrice = $purchasePrice;
			$this->tax = $tax;
			$this->description = $description;
			$this->profit = $profit;
		}

		public function getName(): string {
			return $this->name;
		}

		public function getCategory(): string {
			return $this->category;
		}

		public function getSalesprice(): float {
			return $this->purchasePrice + $this->tax + $this->profit;
		}

		public function printInfo(): string {
			$info = $this->getInfo();

			$infostring = '<ul>';
			foreach ( $info as $data ) {
				if ( is_string( $data ) ) {
					$infostring .= "<li>$data</li>";
				} else if ( is_array( $data ) ) { 
					$infostring .= "<li>Extra info</li><ul>";
					foreach ( $data as $dat ) {
						$infostring .= "<li>$dat</li>";
					}
					$infostring .= '</ul>';
				} 				
			}
			$infostring .= '</ul>';

			return $infostring;
		}

		public abstract function getInfo();

		public abstract function setCategory();
	}

	class Game extends Product {
		private string $genre;
		private array $requirements;

		public function __construct( 
			string $name,
			float $purchasePrice,
			int $tax,
			string $description,
			float $profit
		) {
			parent::__construct( $name, $purchasePrice, $tax, $description, $profit );
			$this->setCategory();
		}

		public function setGenre( string $genre ) {
			$this->genre = $genre;
		}
		public function addRequirements( array $requirements ) {
			$this->requirements = $requirements;
		}

		public function getInfo(): array {
			return array( $this->genre, $this->requirements );
		}

		public function setCategory() {
			$this->category = 'Game';
		}
	}

	class Movie extends Product {
		private string $quality;

		public function __construct(
			string $name,
			float $purchasePrice,
			int $tax,
			string $description,
			float $profit
		) {
			parent::__construct( $name, $purchasePrice, $tax, $description, $profit );
			$this->setCategory();
		}

		public function setQuality( $quality ) {
			$this->quality = $quality;
		}

		public function getInfo(): array {
			return array( $this->quality );
		}

		public function setCategory() {
			$this->category = 'Movie';
		}
	}

	class Music extends Product {
		private string $artist;
		private array $numbers;

		public function __construct(
			string $name,
			float $purchasePrice,
			int $tax,
			string $description,
			float $profit
		) {
			parent::__construct( $name, $purchasePrice, $tax, $description, $profit );
			$this->setCategory();
		}

		public function setArtist( $artist ) {
			$this->artist = $artist;	
		}

		public function addNumber( $number ) {
			$this->numbers[] = $number;
		} 

		public function getInfo(): array {
			return array( $this->artist, $this->numbers );
		}

		public function setCategory() {
			$this->category = 'Music';
		}
	}

	class ProductList {
		private array $products;
		
		public function addProduct( $product ) {
			$this->products[] = $product;
		}

		public function getProducts(): array {
			return $this->products;
		}
	}

	$game1 = new Game( 'Call of Duty 1', 6, 1, 'Shoot pew pew', 0.87 );
	$game1->setGenre( 'FPS' );
	$game1->addRequirements( array( '16gb geheugen', '2070 RTX' ) );

	$game2 = new Game( 'Call of Duty 2', 12, 1, 'Pew pew: 2', 0.92 );
	$game2->setGenre( 'FPS' );
	$game2->addRequirements( array( '16gb geheugen', '2070 RTX' ) );

	$movie1 = new Movie( 'Starwars 1', 14, 1, 'lightsaber go brr', 0.13 );
	$movie1->setQuality( 'DVD' );

	$movie2 = new Movie( 'Starwars 2', 21, 1, 'Kill all them kids', 0.39 );
	$movie2->setQuality( 'Blueray' );

	$music1 = new Music( 'Test1', 6, 1, 'muziek dingen', 0.9 );
	$music1->setArtist( 'Artiest 1' );
	$music1->addNumber( 'number 1' );
	$music1->addNumber( 'number 2' );

	$music2 = new Music( 'Test2', 14, 1, 'Blabla', 0.13 );
	$music2->setArtist( 'Artiest 2' );
	$music2->addNumber( 'number 3' );
	$music2->addNumber( 'number 4' );

	
	$productlist = new ProductList();
	$productlist->addProduct( $game1 );
	$productlist->addProduct( $game2 );
	$productlist->addProduct( $movie1 );
	$productlist->addProduct( $movie2 );
	$productlist->addProduct( $music1 );
	$productlist->addProduct( $music2 );
	$products = $productlist->getProducts();

	$table = "<table border='gray'>";
	$table .= "<tr><th>Category</th><th>Naam product</th><th>Verkoopprijs</th><th>Info</th></tr>";
	foreach( $products as $product ) {
		$table .= "<tr>";
		$table .= "<td>" . $product->getCategory() . "</td>";
		$table .= "<td>" . $product->getName() . "</td>";
		$table .= "<td>" . $product->getSalesprice() . "</td>";
		$table .= "<td>" . $product->printInfo() . "</td>";
		$table .= "</tr>";
	}
	$table .= "</table>";

	echo $table;
}