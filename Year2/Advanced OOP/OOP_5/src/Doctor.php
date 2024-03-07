<?php

namespace Hospital {
	class Doctor extends Staff {
		private float $salary;

		public function __construct( string $name, string $role ) {
			$this->setName( $name );
			$this->decideRole( $role );
		}

		public function decideRole( $role ) {
			if( $role == 'Doctor' ) {
				$this->setRole( $role );
			} else {
				$this->setRole( 'Doctor' );
			}
		}

		public function setSalary( $amount ) {
			$this->salary = $amount;
		}
		public function getSalary() {
			return $this->salary;
		}
	}
}