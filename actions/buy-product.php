<?php
include_once "../classes/Product.php";

$product = new Product;
$product->buyProduct($_POST);
?>