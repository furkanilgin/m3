<?php

class AnasayfaController extends Controller{

	public $anasayfa;

	public function load(){
	
		parent::load();
		if(empty($_POST)){
			$stmt = $this->db->query("SELECT * FROM anasayfa LIMIT 1");
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->anasayfa->p_Panel->panelItemList[0]->text = $row["text"];
		}
	}

	public function save(){
		
		$this->db->exec("UPDATE anasayfa SET 
								text='".$this->anasayfa->p_Panel->panelItemList[0]->text."'");
								
		Notification::success("Anasayfa yazısı başarıyla değiştirildi");
	}
}