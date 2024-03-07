<?php

namespace Hospital {
	abstract class Person {
		private string $name;
		private string $role;

		public function __construct( string $name, string $role ) {
			$this->setName( $name );
			$this->setRole( $role );
		}

		public function setName( string $name ) {
			$this->name = $name;
		}

		public function setRole( string $role ) {
			$this->role = $role;
		}

		public function getName(): string {
			return $this->name;
		}

		public function getRole() {
			return $this->role;
		}

		public abstract function decideRole( $role );
	}
}