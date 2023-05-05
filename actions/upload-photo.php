<?php
session_start();

include "../classes/User.php";

$user_id = $_SESSION['id'];
$photo_name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

$user = new User;
$user->uploadPhoto($user_id, $photo_name, $tmp_name);

?>