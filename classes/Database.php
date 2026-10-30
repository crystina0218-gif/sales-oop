<?php
class Database
{
 //conn->database
 private $server_name = "localhost";
 private $username = "root";
 private $password = "root";
 private $db_name = "sales-oop";
protected $conn;


 public function __construct()
 {
//Connect to the database
    $this->conn = new mysqli($this->server_name, $this->username, $this->password,$this->db_name);
 
//check connection for errors
if($this->conn->connect_error){
    die("Connection Failed:" . $this->conn->connect_error);
}
}
}
?>