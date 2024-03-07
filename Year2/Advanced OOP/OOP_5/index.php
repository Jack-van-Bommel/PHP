<?php

require_once 'vendor/autoload.php';

use Hospital\Appointment;
use Hospital\Patient;
use Hospital\Doctor;
use Hospital\Nurse;

// Patients
$patient1 = new Patient( 'Jantje', 'Patient', 100 );
$patient2 = new Patient( 'Piet', 'Patient', 100 );
$patient3 = new Patient( 'Klaas', 'Patient', 100 );
$patient4 = new Patient( 'Eefje', 'Patient', 100 );

// Doctors
$doctor1 = new Doctor( 'Mohammed', 'doctor' );
$doctor1->setSalary( 100 );
$doctor2 = new Doctor( 'Pieter', 'doctor' );
$doctor2->setSalary( 120 );
$doctor3 = new Doctor( 'Simone', 'doctor' );
$doctor3->setSalary( 140 );

// Nurses
$nurse1 = new Nurse( 'Jennifer', 'nurse' );
$nurse1->setSalary( 2400 );
$nurse2 = new Nurse( 'Kelly', 'nurse' );
$nurse2->setSalary( 2500 );
$nurse3 = new Nurse( 'Xenia', 'nurse' );
$nurse3->setSalary( 2600 );

// appointments
$appointment1 = new Appointment();
$appointment1->setAppointment( $patient1, $doctor1, [ $nurse1, $nurse2 ], 
new DateTime( '2020-04-07 12:00:00' ), new DateTime( '2020-04-07 13:00:00' ) );
$appointment2 = new Appointment();
$appointment2->setAppointment( $patient2, $doctor2, [ $nurse2, $nurse3 ],
new DateTime( '2024-05-12 15:00:00' ), new DateTime( '2024-06-12 15:00:00') );
$appointment3 = new Appointment();
$appointment3->setAppointment( $patient4, $doctor3, [ $nurse3 ],
new DateTime( '2001-09-11 08:46:00'), new DateTime( '2001-09-11 09:03:00') );

