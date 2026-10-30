<?php
//require the database class for database connection
require_once 'Database.php';

class Product extends Database
{
    //method to retrieve all products form the database 
    public function getAllProducts()
    {
        //SQL query to select all records from the 'product' table

        $sql = "SELECT id ,product_name, price,quantity FROM product";

        //Execute the query and check for results

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            //display an error massage ;if the query fails
            die("Error retrieving products:" . $this->conn->error);
        }
    }
    //method to add a new product to database
    public function addProduct($request)
    {
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO product (product_name, price, quantity) VALUE ('$product_name', '$price', '$quantity')";

        if($this->conn->query($sql)){
            //redirect to dashboard after successful insertion
            header('location: ../views/dashboard.php');
            exit;
        }else{
            die("Error adding product:" . $this->conn->error);
        }
    }
    //method to delete a product from the database 
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id = $id";
        if($this->conn->query($sql)){
            //redirect to dashboard after successful deletion
            header('location: ../views/dashboard.php');
            exit;
        }else{
            die("Error deleting product: " . $this->conn->error);
        }
    }
    //method to get a specific product by ID
    public function getProduct($id)
    {
        $sql = "SELECT id ,product_name, price, quantity FROM product WHERE id = $id";
        if($result = $this->conn->query ($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error retrieving product: " . $this->conn->error);
        }
    }

    // Method to update a product in the database
    public function updateProduct($request)
    {
        $id           = $request['id'];
        $product_name = $request['product_name'];
        $price        = $request['price'];
        $quantity     = $request['quantity'];
        // $price        = floatval($request['price']);
        // $quantity     = intval($request['quantity']);

        $sql = "UPDATE product SET product_name = '$product_name', price = '$price', quantity = '$quantity' WHERE id = '$id'";

        if ($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit;
        } else {
            die("Error updating product: " . $this->conn->error);
        }
    }

    // Method to buy a product (reduce quantity)
    public function buyProduct($request)
    {
        $id           = $request['id'];
        $quantity_buy = $request['quantity_buy'];

        $sql = "UPDATE product SET quantity = quantity - $quantity_buy WHERE id = $id";

        if ($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit;
        } else {
            die("Error buying product: " . $this->conn->error);
        }
    }
}