<?php

    class Database{
        // Proparties
        private $server_name = "localhost";
        private $username = "root";
        private $password = ""; // "" for XAMMP, "root" for MAMP
        private $db_name = "the-company";
        
        protected $conn;
        
        // Method

        public function __construct(){
            $this->conn = new mysqli(
                $this->server_name,
                $this->username,
                $this->password,
                $this->db_name
            );

            if($this->conn->connect_error){
                exit("Unable to connect to the database:" + 
                    $this->conn->connect_error
            );
            }
        }
    }

?>