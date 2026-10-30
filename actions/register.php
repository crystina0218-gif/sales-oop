<?php
//Require the User.php file
require_once '../classes/User.php';

//Create an instance of the user
$user = new User;

//pass the post data form to  the store method
$user->store($_POST);

?>