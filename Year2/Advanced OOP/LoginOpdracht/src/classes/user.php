<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans, Edited by Jack

    namespace LoginOpdracht\classes;

    use PDO;
    use PDOException;

    class User{
        public $username;
        private $password;
        protected $conn;
        
        public function __construct() {
            $this->connectDatabase();
        }

        public function connectDatabase(): void {
            try {
                $this->conn = new PDO( 'mysql:host=localhost;dbname=login_database', 'root', '' );
            } catch( PDOException $e ) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function setPassword( $password ){
            $this->password = $password;
        }
        function getPassword(){
            return $this->password;
        }

        public function showUser() {
            echo "<br>Username: " . $_SESSION['username'] . "<br>";
            echo "<br>Password: " . $_SESSION['password'] . "<br>";
        }

        public function registerUser(){
            $query = $this->conn->query( "INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES (NULL, '$this->username', 'ik heb geen email function gemaakt', '$this->password'); ");
            $query->execute();
        }

        function validateUser(): array {
            $errors = array();

            $query = $this->conn->query( "SELECT * FROM users WHERE username = '$this->username'" );
            $queryResult = $query->fetchAll( PDO::FETCH_ASSOC );

            if ( $queryResult[0]['username'] != $this->username ) {
                array_push( $errors, 'Username not found' );
            } else if( $queryResult[0]['password'] != $this->password) {
                array_push( $errors, 'Password incorrect' );
            }

            return $errors;
        }

        function validateNewUser(): array{
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            }

            $query = $this->conn->query( "SELECT username FROM users WHERE username = '$this->username'" );
            $queryResult = $query->fetchAll();
            if( count( $queryResult ) > 0 ) {
                array_push( $errors, 'Username already in use' );
            } else if ( strlen( $this->username ) < 3 || strlen( $this->username ) > 50 ) {
                array_push( $errors, 'Username should be between 3 and 50 characters long' );
            }
            
            return $errors;
        }

        public function loginUser(){
            $query = $this->conn->query( "SELECT username FROM users WHERE username = '$this->username'" );
            $queryResult = $query->fetchALL( PDO::FETCH_ASSOC );

            if ( count( $queryResult ) > 0 ) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $this->username;
                $_SESSION['password'] = $this->password;
                $this->isLoggedin();
            } else {
                unset( $_SESSION['loggedin'] );
                header( 'login_form.php' );
            }
        }

        // Check if the user is already logged in
        public function isLoggedin() {
            if ( isset( $_SESSION['loggedin'] ) && $_SESSION['loggedin'] == true ) {
                // Print userdata
                echo "<h2>Het spel kan beginnen</h2>";
                echo "Je bent ingelogd met:<br/>";
                $this->showUser();
                echo "<br><br>";
                echo '<a href = "?logout=true">Logout</a>';
            } else {
                return false;
            }

            // Indien Logout geklikt
            if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
                $this->logout();
            }
        }

        public function getUser( $username ){
            $query = $this->conn->query( "SELECT username FROM users WHERE username = '$username'" );
            $queryResult = $query->fetchAll( PDO::FETCH_ASSOC );
            if ( count( $queryResult ) != 0 ){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = $queryResult['username'];
            } else {
                return false;
            }   
        }

        public function logout(){
            session_unset();
            session_destroy();

            header('location: index.php');
            exit();
        }

        public function setUser( string $username ) {
            $this->username = $username;
        }
    }
