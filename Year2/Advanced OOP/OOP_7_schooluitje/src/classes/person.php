<?php

namespace Schooluitje\classes;

abstract class Person {
	private string $name;
	private string $role;

	public function __construct( string $name ) {
		$this->name = $name;
	}

	public function getRole(): string {
		return $this->role;
	}

	public function getName(): string {
		return $this->name;
	}

	abstract function role();
}