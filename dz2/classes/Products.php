<?php
// ����������� �������
abstract class Product {
    public static $price = 500;
	
    abstract public function getPrice();
}

// ������� �����
class PieceProduct extends Product {
	use TSingleton;

    public function getPrice() {
        return static::$price;
    }
}

// �������� �����
class DigitalProduct extends Product {
	use TSingleton;

    public function getPrice() {
        return static::$price / 2;
    }
}

// ������� �����
class WeightProduct extends Product {
	use TSingleton;

    public $weight = 1;

    public function getPrice() {
        return $this->weight * static::$price;
    }
}