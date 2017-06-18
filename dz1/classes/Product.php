<?php
/**
  *  �������
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
	
	// ������������� ��������� ������
	public function setPrice($price) {
		$this->price = $price;
	}
	
	// ��������� ������
	public function getCost() {
		return $this->price;
	}
	
	// ��� ������ ������� ��� ������
	public function __toString() {
		return get_called_class() .": ". $this->id ." - '". $this->name ."' - ". $this->getCost() ."$\n";
	}
}