<?php

namespace drawFigures{
	abstract class Figure {
		private string $color;

		public function __construct( string $color ) {
			$this->setColor( $color );
		}

		public function setColor( string $color ) {
			$this->color = $color;
		}

		public function getColor(): string {
			return $this->color;
		}

		public abstract function draw();
	}

	class Triangle extends Figure {
		private int $height;
		private int $width;

		public function __construct( string $color, int $height, int $width ) {
			$this->height = $height;
			$this->width = $width;
			parent::setColor( $color );
		}

		public function draw() {
			$color = parent::getColor();
			return "<svg height='$this->height' width='$this->width'>
						<polygon points='200,100 250,190 150,190' style='fill:$color' />
					</svg>";
		}
	}

	class Square extends Figure {
		private  int $length;
		public function __construct( string $color, int $length ) {
			parent::setColor( $color );
			$this->length = $length;
		}

		public function draw(): string{
			$color = parent::getColor();
			return "<svg width='$this->length' height='$this->length'>
						<rect width='$this->length' height='$this->length' fill='$color' />
				    </svg>";
		}
	}

	class Rectangle extends Figure {
		private int $height;
		private int $width;
		
		public function __construct( string $color, int $height, int $width ) {
			parent::setColor( $color );
			$this->height = $height;
			$this->width = $width;
		}

		public function draw(): string {
			$color = parent::getColor();
			return "<svg width='$this->width' height='$this->height'>
						<rect width='$this->width' height='$this->height' fill='$color' />
				    </svg>";
		}
	}

	class Circle extends Figure {
		private int $length;
		private int $radius;

		public function __construct( string $color, int $length ) {
			parent::setColor( $color );
			$this->length = $length;
			$this->radius = $length / 2;
		}

		public function draw(): string {
			$color = parent::getColor();
			return "<svg height='$this->length' width='$this->length'>
						<circle r='$this->radius' fill='$color' cx='$this->radius' cy='$this->radius' />
		  			</svg>";
		}
	}

	$square = new Square( 'blue', 100 );
	echo $square->draw();

	$triangle = new Triangle( 'green', 200, 300 );
	echo $triangle->draw();

	$rectangle = new Rectangle( 'red', 100, 200 );
	echo $rectangle->draw();

	$circle = new Circle( 'yellow', 90 );
	echo $circle->draw();
}