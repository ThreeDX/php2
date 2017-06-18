<?php
require_once "traits/TSingleton.php";
require_once "classes/Products.php";


// ������ ��������� � ����������� ���������� ��� ������� ������������� �������,
// ����� �� ������ ������� ���� ������� ����������� ���� ������ �� ���� ��������.

$product = PieceProduct::GetInstance();
$digital_product = DigitalProduct::GetInstance();
$weight_product = WeightProduct::GetInstance();

$weight_product->weight = 1.2;

echo "Piece product: {$product->getPrice()}\n";
echo "Digital product: {$digital_product->getPrice()}\n";
echo "Weight product: {$weight_product->getPrice()}\n";