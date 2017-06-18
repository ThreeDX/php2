<?php
/**
  *  Продукт
  **/
class Product {
	protected $id;
	protected $name;
	protected $description;
	protected $price;
	
	function __construct($id, $name, $description, $price) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}
	
	// Устанавливает стоимость товара
	public function setPrice($price) {
		$this->price = $price;
	}
	
	// Стоимость товара
	public function getCost() {
		return $this->price;
	}
	
	// Для вывода объекта при печати
	public function __toString() {
		return get_called_class() .": ". $this->id ." - '". $this->name ."' - ". $this->getCost() ."$\n";
	}
}