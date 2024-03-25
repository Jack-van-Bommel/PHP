<?php

namespace LoginOpdracht_2\classes;

use PDO;

require "database.php";

    class User extends Database {

        // Eigenschappen 
        public string $username;
        public string $email;
        private string $password;

        function SetPassword($password): void {
            $this->password = $password;
        }
        function GetPassword(): string {
            return $this->password;
        }

        public function ShowUser(): bool {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            return true;
        }

        public function RegisterUser(): array {
            $this->setDatabaseProperties( 'root', '', 'localhost', 'login_database' );
            $this->connectDatabase();

            $status = false;
            $errors=[];
            if($this->username != "" || $this->password != ""){
                $query = $this->conn->query( 'SELECT username FROM users' );
                $queryResult = $query->fetchALL( PDO::FETCH_ASSOC );

                if( in_array( $this->username, $queryResult ) ){
                    array_push($errors, "Username bestaat al.");
                } else {
                    $query = $this->conn->query( "INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES (NULL, '$this->username', '$this->username', '$this->password');");
                    $query->execute();

                    $status = true;
                }
            }
            return $errors;
        }

        function ValidateUser(): array {
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            } else if ( strlen( $this->username ) < 3 || strlen( $this->password ) > 50 ) {
                array_push($errors, "Username must be between 3 and 50 characters");
            }

            return $errors;
        }

        public function LoginUser(): bool  {
            $this->setDatabaseProperties( 'root', '', 'localhost', 'login_database' );
            $this->connectDatabase();

            // Zoek user in de table user
            $query = $this->conn->query( "SELECT * FROM users WHERE username = '$this->username'" );
            $queryResult = $query->fetchALL( PDO::FETCH_ASSOC );

            if ( empty( $queryResult ) ) {
                return false;
            } else if ( $this->password == $queryResult[0]['password'] ) {
                echo "Username:" . $this->username;

                // Indien gevonden dan sessie vullen
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $queryResult[0]['username'];
    
                return true;
            } else {
                return false;
            }
        }

        // Check if the user is already logged in
        public function IsLoggedin(): bool {
            if ( ! isset( $_SESSION['loggedIn'] ) ) {
                return false;
            } else if ( $_SESSION['loggedIn'] == false ) {
                return false;
            } else {
                return true;
            }
        }

        public function GetUser($username): void {
            $this->setDatabaseProperties( 'root', '', 'localhost', 'login_database' );
            $this->connectDatabase();

            $query = $this->conn->query( "SELECT * FROM users WHERE username = '$username'" );
            $queryResult = $query->fetchALL( PDO::FETCH_ASSOC );
		    
            if ( ! is_null( $queryResult ) ){
                $this->username = $queryResult[0]['username'];
                $this->password = $queryResult[0]['password'];
            } 
        }

        public function Logout(): void {
            session_start();

            session_unset();
            
            session_destroy();
            
            header('location: index.php');
        }
    }
