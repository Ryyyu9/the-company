<?php

    require "Database.php";

    // Inherits the protected and public proparties and methods of Database.php
    class User extends Database {
        public function register($data){
            $first_name = $data["first_name"];
            $last_name = $data["last_name"];
            $username = $data["username"];
            $password = $data["password"];

            // Hash the password
            $secure_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert data
            $sql = "INSERT INTO `users`
            (`first_name`, `last_name`, `username`, `password`)
            VALUES
            ('$first_name', '$last_name', '$username', '$secure_password')";

            if($this->conn->query($sql)){
                header("Location: ../views/index.php");
                exit;
            }else{
                exit("Error creating new user: ". $this->conn->error);
            }
        }
        
        public function login($data){
            $username = $data['username'];
            $password = $data['password'];

            $sql = "SELECT * FROM `users` WHERE `username` = '$username'";

            // This if check if the query has no error
            if($result = $this->conn->query($sql)){
                
                // This if checks if there is a result
                if($result->num_rows == 1){
                    $user = $result->fetch_assoc();

                    // Verify the password
                    if(password_verify($password, $user['password'])){
                        session_start();
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['full_name'] = $user['first_name']. " ". $user['last_name'];

                        header("Location: ../views/dashboard.php");
                        exit;
                    }else{
                        // If the password did not match
                        exit("The password incorrect");
                    }
                }else{
                    // If the username is not found
                    exit("Username not found");
                }
            }else{
                // If there was an error in the query
                exit("Query Error: ". $this->conn->error);
            }
        }

        public function logout(){
            session_start();
            session_unset();
            session_destroy();

            header("location: ../views");
            exit;
        }

        public function getAllUsers(){
            $sql = "SELECT id, first_name, last_name, username, photo FROM `users` WHERE id != ".$_SESSION['id'];

            if($result = $this->conn->query($sql)){
                return $result;
            }else{
                die("Error in retrieving all Users: ". $this->conn->error);
            }
        }

        public function getUser($id){
            // $id = $_SESSION['id']; 
            
            $sql = "SELECT * FROM `users` WHERE id = '$id'";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();
            }else{
                die("Error in retrieving all Users: ". $this->conn->error);
            }
        }

        public function update($input){

            $user_id = $input['id'];
            $first_name = $input['first_name'];
            $last_name = $input['last_name'];
            $username = $input['username'];

            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id";

            $result = $this->conn->query($sql);

            if($result){
                header("Location: ../views/dashboard.php");
            }else{
                die("An error occured: ". $this->conn->error);
            }
        }

        public function deleteUser($id){
            // $id = $_SESSION['id'];

            $sql = "DELETE FROM users WHERE id = $id";

            if($this->conn->query($sql)){
                header("Location: ../views/dashboard.php");
                exit;
            }else{
                die("Error deleting user: ". $this->conn->error);
            }
        }

        public function uploadPhoto($user_id, $photo_name, $tmp_name){
            $sql = "UPDATE users SET photo = '$photo_name' WHERE id = $user_id";

            if($this->conn->query($sql)){
                $destination = "../assets/images/$photo_name";
                
                if(move_uploaded_file($tmp_name, $destination)){
                    header("location: ../views/profile.php");
                    exit;
                }else{
                    die("Error moving the photo");
                }
            }
        }



        
    }

?>