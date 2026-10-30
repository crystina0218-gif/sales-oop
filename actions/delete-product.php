<?php

//require the Product class
require_once"../classes/Product.php";

//create an instance of product
$product = new Product;

//call the deleteProduct method passing the ID from URL(GET)
$product->deleteProduct($_GET['id']);
?>