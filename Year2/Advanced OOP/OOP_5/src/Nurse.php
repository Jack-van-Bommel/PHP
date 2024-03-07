<?php

namespace Hospital {
	class Nurse extends Staff {
		private float $salary;

		public function __construct( string $name, string $role ) {
			$this->setName( $name );
			$this->decideRole( $role );
		}

		public function decideRole( $role ) {
			if( $role == 'Nurse' ) {
				$this->setRole( $role );
			} else {
				$this->setRole( 'Nurse' );
			}
		}

		public function setSalary( $amount ) {
			$this->salary = $amount;
		}

		public function getSalary( $amount ) {
			return $this->salary;
		}
	}
}