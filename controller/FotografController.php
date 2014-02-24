<?php

class FotografController extends Controller{

	public $fotograf;

	public function load(){
	
		parent::load();
		$this->fillProjeCombobox();
		$this->fill_datatable();
	}

	public function save(){
		
		if(empty($this->fotograf->p_Panel->panelItemList[0]->text)){ // add
			if(!empty($this->fotograf->p_Panel->panelItemList[2]->filename)){
				if($this->fotograf->p_Panel->panelItemList[2]->upload("./upload/") == "true"){
					$this->db->exec("INSERT INTO proje_fotograflari (proje_id, fotograf) 
										VALUES
									 ('".$this->fotograf->p_Panel->panelItemList[1]->selectedItem."',
									  './upload/".$this->fotograf->p_Panel->panelItemList[2]->filename."');");
					
					Notification::success("Yeni kayıt başarıyla eklendi");
					$this->empty_fields();
				}
			}
		}
		else{ //edit
			if(!empty($this->fotograf->p_Panel->panelItemList[2]->filename)){
				if($this->fotograf->p_Panel->panelItemList[2]->upload("./upload/") == "true"){
					
					$stmt = $this->db->query("SELECT * FROM proje_fotograflari WHERE id='".$this->fotograf->p_Panel->panelItemList[0]->text."'");
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					/** delete old one */
					if(file_exists("../../".$row["fotograf"])){
						unlink("../../".$row["fotograf"]);
					}
					
					// update db
					$this->db->exec("UPDATE proje_fotograflari SET 
										proje_id='".$this->fotograf->p_Panel->panelItemList[1]->selectedItem."',
										fotograf='./upload/".$this->fotograf->p_Panel->panelItemList[2]->filename."'
									 WHERE id='".$this->fotograf->p_Panel->panelItemList[0]->text."'");
									 
					Notification::success($this->fotograf->p_Panel->panelItemList[0]->text." nolu kayıt başarıyla düzenlendi");
					$this->empty_fields();
				}
			}
			else{
				$this->db->exec("UPDATE proje_fotograflari SET 
										proje_id='".$this->fotograf->p_Panel->panelItemList[1]->selectedItem."'
									 WHERE id='".$this->fotograf->p_Panel->panelItemList[0]->text."'");
								 
				Notification::success($this->fotograf->p_Panel->panelItemList[0]->text." nolu kayıt başarıyla düzenlendi");
				$this->empty_fields();
			}
		}
		
		$this->fill_datatable();
	}
	
	public function edit(){

		$stmt = $this->db->query("SELECT * FROM proje_fotograflari LIMIT ".($_POST["rowIndex"]-1).",1");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->fotograf->p_Panel->panelItemList[0]->text = $row["id"];
		$this->fotograf->p_Panel->panelItemList[1]->selectedItem = $row["proje_id"];
		$this->fotograf->p_Panel->panelItemList[2]->required = "false";
	}
	
	public function delete(){
	
		$stmt = $this->db->query("SELECT * FROM proje_fotograflari LIMIT ".($_POST["rowIndex"]-1).",1");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->db->exec("DELETE FROM proje_fotograflari WHERE id='".$row["id"]."'");

		if(file_exists("../../".$row["fotograf"])){
			unlink("../../".$row["fotograf"]);
		}
		
		Notification::success($row["id"]." nolu kayıt başarıyla silindi");
		$this->empty_fields();
		$this->fill_datatable();
	}
	
	public function fillProjeCombobox(){
	
		$stmt = $this->db->query("SELECT id,projeadi FROM proje");
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$option = array();
		foreach($rows as $row){
			$option[$row[id]] = $row["projeadi"];
		}

		$this->fotograf->p_Panel->panelItemList[1]->items = $option;
	}
	
	public function fill_datatable(){
	
		$stmt = $this->db->query("SELECT * FROM proje_fotograflari");
		$rows = $stmt->fetchAll(PDO::FETCH_NUM);
		foreach($rows as $key => $row){
			$row[1] = $this->fotograf->p_Panel->panelItemList[1]->items[$row[1]];
			$rows[$key] = $row;
		}
		
		$this->fotograf->p_Panel->panelItemList[4]->dataset = $rows;
	}
	
	public function empty_fields(){
		
		$this->fotograf->p_Panel->panelItemList[0]->text = "";
		$this->fotograf->p_Panel->panelItemList[1]->selectedItem = "";
		$this->fotograf->p_Panel->panelItemList[2]->filename = "";
	}
}