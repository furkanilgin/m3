<?php

class FotografController{

	public $fotograf;

	public function load(){
	
		session_start();
		if(!isset($_SESSION["valid_user"])){
			$this->logout();
		}
		
		$this->fotograf->p_Panel->panelItemList[0]->items = array("1" => "city1", "2" => "city2", "3" => "city3");
	}
	
	public function save(){
	
	}
	
	public function logout(){
		
		session_destroy();
		echo "<script>location='login';</script>";
	}
}