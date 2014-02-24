<?php

class FotografController extends Controller{

	public $fotograf;

	public function load(){
	
		parent::load();
		$this->fillProjeCombobox();
	}

	public function save(){
			
	}
	
	public function fillProjeCombobox(){
	
		$stmt = $this->db->query("SELECT id,projeadi FROM proje");
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$option = array();
		foreach($rows as $row){
			$option[$row[id]] = $row["projeadi"];
		}

		$this->fotograf->p_Panel->panelItemList[0]->items = $option;
	}
}