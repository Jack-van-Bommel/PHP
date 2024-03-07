<?php

namespace Hospital {
	class Patient extends Person {
		private float $payment;

		public function __construct( string $name, string $role, float $payment ) {
			$this->setName( $name );
			$this->setPayment( $payment );
			$this->decideRole( $role );
		}

		public function decideRole( $role ) {
			if( $role == 'Patient' ) {
				$this->setRole( $role );
			} else {
				$this->setRole( 'Patient' );
			}
		}

		public function setPayment( float $payment ) {
			$this->payment = $payment;
		}

		public function getPayment( float $payment ) {
			return $this->payment;
		}
	}
}