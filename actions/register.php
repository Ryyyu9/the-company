<?php
// Get the class
    require "../classes/User.php";

// Create the object
$user = new User;

// Run the register method inside the user object
// Pass the form inputs into the function
$user->register($_POST)

?>