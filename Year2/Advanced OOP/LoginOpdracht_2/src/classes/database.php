<?php

namespace LoginOpdracht_2\classes;

use PDO;
use PDOException;

class Database {
	protected PDO $conn;
	private string $dbusername;
	private string $dbpassword;
	private string $servername;
	private string $databasename;

	public function setDatabaseProperties( string $dbusername, string $dbpassword, string $servername, string $databasename ) {
		$this->dbusername = $dbusername;
		$this->dbpassword = $dbpassword;
		$this->servername = $servername;
		$this->databasename = $databasename;
	}

	public function connectDatabase() {
		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->databasename", $this->dbusername, $this->dbpassword);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully";

			$this->conn = $conn;
		  } catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		  }
	}
}