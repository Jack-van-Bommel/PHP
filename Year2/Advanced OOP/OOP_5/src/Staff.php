<?php

namespace Hospital {
	abstract class Staff extends Person {
		private float $salary;

		public abstract function setSalary( float $amount ); 
	}
}