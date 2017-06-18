<?php

require_once "classes\Product.php";
require_once "classes\VesProduct.php";

$first_product = new Product(1, "Bag", "Excellent bag for loose products", 10);
$second_product = new VesProduct(2, "Sugar", "Granulated sugar", 8, 1.5);

echo $first_product;
echo $second_product;
