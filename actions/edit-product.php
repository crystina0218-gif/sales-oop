<?php
require_once "../classes/Product.php";

$product = new Product;
$product->updateProduct($_POST);
?>