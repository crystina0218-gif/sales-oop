<?php
//Require the User.php file
require_once '../classes/User.php';

//Create an instance of the User class
$user = new User;

//pass the POST data from the form to the login method
$user->login($_POST);
?>