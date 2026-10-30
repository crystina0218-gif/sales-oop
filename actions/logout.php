<?php
//start the session
session_start();

//Unset all session variables
$_SESSION = array();

//Destroy the  session
session_destroy();

//redirect back to the login view
header('location:../views/index.php');
exit;
?>
