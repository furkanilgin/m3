<?php

class HakkimizdaController extends Controller{

	public $hakkimizda;

	public function load(){
	
		parent::load();
		if(empty($_POST)){
			$stmt = $this->db->query("SELECT * FROM hakkimizda LIMIT 1");
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->hakkimizda->p_Panel->panelItemList[0]->text = $row["text"];
		}
	}

	public function save(){
		
		$this->db->exec("UPDATE hakkimizda SET 
								text='".$this->hakkimizda->p_Panel->panelItemList[0]->text."'");
								
		Notification::success("Hakkımızda yazısı başarıyla değiştirildi");
	}
}