<?php

use \PHPUnit\Framework\TestCase;
use \LoginOpdracht_2\classes\User;

class LoginTest extends TestCase {
	protected $user;

	protected function setUp(): void {
		$this->user = new User();
	}

	public function testSetPassword() {
		$this->user->SetPassword( 'test_password' );

		$getPassword = $this->user->GetPassword();
		$this->assertEquals( $getPassword, 'test_password' );
	}

	public function testGetPassword() {
		$this->user->SetPassword( 'test_password' );

		$getPassword = $this->user->GetPassword();
		$this->assertEquals( $getPassword, 'test_password' );
	}

	public function testShowUser() {
		$this->user->username = 'test_username';
		$this->user->SetPassword( 'test_password' );
		
		$this->assertTrue( $this->user->ShowUser() );
	}

	public function testLogout() {
		$this->user->Logout();

		$isDeleted = ( session_status() == PHP_SESSION_NONE || empty(session_id()) );
		$this->assertTrue($isDeleted);
	}

	public function testValidateUsers() {
		$errors = $this->user->ValidateUser();

		$this->assertCount( 0, $errors );
	}

	public function testRegisterUser() {
		$errors = $this->user->RegisterUser();

		$this->assertCount( 0, $errors );
	}

	public function testLoginUser() {
		$loginStatus = $this->user->LoginUser();

		$this->assertTrue( $loginStatus );
	}

	public function testIsLoggedIn() {
		$value = $this->user->IsLoggedin();

		$this->assertNotNull( $value );
	}
}
