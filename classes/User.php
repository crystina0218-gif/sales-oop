<?php
//require database
require_once "Database.php";

//Extend Database class to create User.php class
class User extends Database
{

    //method to store user
    public function store($request)
    {
        //assign from data to variables
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        //Hash the password for security
        $password = password_hash($password, PASSWORD_DEFAULT);


        //Create SQL query to insert data
        $sql = "INSERT INTO users(`first_name`,`last_name`, `username`, `password`) VALUES ('$first_name','$last_name','$username','$password')";

        //Execute the SQL query
        if ($this->conn->query($sql)) {

            header('location:../views/index.php');
            exit;
        } else {
            //die and show error message if failed
            die('Error creating the user' . $this->conn->error);
        }
    }
    public function login($request)
    {
        //method to handle user login authentication
        $username = $request['username'];
        $password = $request['password'];

        //Search for user by username
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);

        //check it user exists
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            //Verify the password
            if (password_verify($password, $user['password'])) {
                //start session and store user data
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['first_name'] . ' ' .  $user['last_name'];

                //Redirect to dashboard
                header('location:../views/dashboard.php');
                exit;
            } else {
                die('password is incorrect');
            }
        } else {
            die('Username not found');
        }
    }
    public function getAllUsers()
{
    //Create SQL _query to select all users
    $sql = "SELECT id ,first_name, last_name, username FROM users";
    //Execute query and store result
    if ($result = $this->conn->query($sql)){
    //return all data as an associative array
    return $result;

} else {
    //die and show error if failed
    die("Error retrieving users: ". $this->conn->error);
}
}
}
?>