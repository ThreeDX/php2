<?php
require_once "traits/TSingleton.php";
require_once "classes/Products.php";


// Товары создаются в едиственном экземпляре для примера использования трейтов,
// также по смыслу задания есть жесткая зависимость цены товара от цены базового.

$product = PieceProduct::GetInstance();
$digital_product = DigitalProduct::GetInstance();
$weight_product = WeightProduct::GetInstance();

$weight_product->weight = 1.2;

echo "Piece product: {$product->getPrice()}\n";
echo "Digital product: {$digital_product->getPrice()}\n";
echo "Weight product: {$weight_product->getPrice()}\n";