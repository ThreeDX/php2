<?php
/**
  *  Весовой продукт
  **/
class VesProduct extends Product {
	protected $ves;
	
	function __construct($id, $name, $description, $price, $ves) {
		parent::__construct($id, $name, $description, $price);
		$this->ves = $ves;
	}
	
	// Стоимость товара
	public function getCost() {
		return $this->price * $this->ves;
	}
	
	// Устанавливает вес товара
	public function setVes($ves) {
		$this->ves = $ves;
	}
}