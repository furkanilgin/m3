<?php

class FotografController{

	public $fotograf;

	public function load(){
	
		$this->fotograf->p_Panel->panelItemList[0]->items = array("1" => "city1", "2" => "city2", "3" => "city3");
	}
	
	public function save(){
	
	}
}