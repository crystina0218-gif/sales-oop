<?php

//required the product class
require_once"../classes/Product.php";

//create an instance of product
$product = new product;


//call add product method passing the post data
$product->addProduct($_POST);
?>