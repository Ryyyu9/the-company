<?php

require "../classes/User.php";

$user = new User;

$user->update($_POST);

?>