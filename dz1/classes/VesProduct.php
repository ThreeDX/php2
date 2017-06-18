<?php
/**
  *  ������� �������
  **/
class VesProduct extends Product {
	protected $ves;
	
	function __construct($id, $name, $description, $price, $ves) {
		parent::__construct($id, $name, $description, $price);
		$this->ves = $ves;
	}
	
	// ��������� ������
	public function getCost() {
		return $this->price * $this->ves;
	}
	
	// ������������� ��� ������
	public function setVes($ves) {
		$this->ves = $ves;
	}
}