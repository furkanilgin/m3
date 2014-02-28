<?php

class ProjeController extends Controller{

	public $proje;

	public function load(){
	
		parent::load();
		$this->fill_datatable();
	}

	public function save(){
		
		if(empty($this->proje->p_Panel->panelItemList[0]->text)){ // add
			if(!empty($this->proje->p_Panel->panelItemList[2]->filename)){
				if($this->proje->p_Panel->panelItemList[2]->upload("./upload/") == "true"){
					$this->db->exec("INSERT INTO proje (projeadi, fotograf) 
										VALUES
									 ('".$this->proje->p_Panel->panelItemList[1]->text."',
									  './upload/".$this->proje->p_Panel->panelItemList[2]->filename."');");
					
					Notification::success("Yeni kayıt başarıyla eklendi");
					$this->empty_fields();
				}
			}
		}
		else{ //edit
			if(!empty($this->proje->p_Panel->panelItemList[2]->filename)){
				if($this->proje->p_Panel->panelItemList[2]->upload("./upload/") == "true"){
				
					$stmt = $this->db->query("SELECT * FROM proje WHERE id='".$this->proje->p_Panel->panelItemList[0]->text."'");
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					/** delete old one */
					if(file_exists("../../".$row["fotograf"])){
						unlink("../../".$row["fotograf"]);
					}
					
					// update db
					$this->db->exec("UPDATE proje SET 
										projeadi='".$this->proje->p_Panel->panelItemList[1]->text."',
										fotograf='./upload/".$this->proje->p_Panel->panelItemList[2]->filename."'
									 WHERE id='".$this->proje->p_Panel->panelItemList[0]->text."'");
					
					Notification::success($this->proje->p_Panel->panelItemList[0]->text." nolu kayıt başarıyla düzenlendi");
					$this->empty_fields();
				}
			}
			else{
				$this->db->exec("UPDATE proje SET 
										projeadi='".$this->proje->p_Panel->panelItemList[1]->text."'
									 WHERE id='".$this->proje->p_Panel->panelItemList[0]->text."'");
								 
				Notification::success($this->proje->p_Panel->panelItemList[0]->text." nolu kayıt başarıyla düzenlendi");
				$this->empty_fields();
			}
		}
		
		$this->fill_datatable();
	}
	
	public function edit(){

		$stmt = $this->db->query("SELECT * FROM proje LIMIT ".($_POST["rowIndex"]-1).",1");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->proje->p_Panel->panelItemList[0]->text = $row["id"];
		$this->proje->p_Panel->panelItemList[1]->text = $row["projeadi"];
		$this->proje->p_Panel->panelItemList[2]->required = "false";
	}
	
	public function delete(){
	
		$stmt = $this->db->query("SELECT * FROM proje LIMIT ".($_POST["rowIndex"]-1).",1");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->db->exec("DELETE FROM proje WHERE id='".$row["id"]."'");

		if(file_exists("../../".$row["fotograf"])){
			unlink("../../".$row["fotograf"]);
		}
		
		Notification::success($row["id"]." nolu kayıt başarıyla silindi");
		$this->empty_fields();
		$this->fill_datatable();
	}
	
	public function fill_datatable(){
	
		$stmt = $this->db->query("SELECT * FROM proje");
		$rows = $stmt->fetchAll();
		$this->proje->p_Panel->panelItemList[4]->dataset = $rows;
	}
	
	public function empty_fields(){
		
		$this->proje->p_Panel->panelItemList[0]->text = "";
		$this->proje->p_Panel->panelItemList[1]->text = "";
		$this->proje->p_Panel->panelItemList[2]->filename = "";
	}
}