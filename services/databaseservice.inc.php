
<?php

/**
 * A class named DatabaseService is responsible for connecting to the Database
 */
class DatabaseService {

    // Properties
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $databaseName = "task_management";



    // Methods
    
    // A method that connects to the Local Server and returns a connection
    protected function connectLocal() {

        /**
         * Connects to:
         * Server
         * Username
         * Password
         * Database Name
         */
        $conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->databaseName);

        // Kills the connection if it's not connected successfully
        if($conn->connect_error) {
            die("Connection Failed!");
            // header("Location: ./index.php");
        }

        return $conn; // Returns the Connection
     
    }


}   