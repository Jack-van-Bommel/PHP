<?php

namespace Hospital {
	class Appointment {
		private Patient $patient;
		private Doctor $doctor;
		private array $nurses;
		private $beginTime;
		private $endTime;
		public int $count;
		public array $appointments;

		public function setAppointment( Patient $patient, Doctor $doctor, array $nurses, $beginTime, $endTime ) {
			$this->appointments[] = [ $doctor, $patient, [ $nurses ], $beginTime, $endTime ];
		}

		public function addNurse( Nurse $nurse ) {
			$this->nurses[] = $nurse;
		}

		public function getDoctor(): Doctor {
			return $this->doctor;
		}

		public function getPatient(): Patient {
			return $this->patient;
		}

		public function getNurses(): array {
			return $this->nurses;
		}

		public function getBeginTime(): string {
			return (string) $this->beginTime;
		}

		public function getEndTime(): string {
			return (string) $this->endTime;
		}

		public function getTimeDifference(): float {
			$beginTime = $this->getBeginTime();
			$endTime = $this->getEndTime();
			return $beginTime - $endTime;
		}

		public function getCosts(): float {
			
		}

	}
}