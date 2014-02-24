<?php

class BizkimizController extends Controller{

	public $bizkimiz;

	public function load(){
	
		parent::load();
		$this->fill_datatable();
	}

	public function save(){
	
		if(empty($this->bizkimiz->p_Panel->panelItemList[0]->text)){ // add
			if(!empty($this->bizkimiz->p_Panel->panelItemList[2]->filename)){
				if($this->bizkimiz->p_Panel->panelItemList[2]->upload("./upload/") == "true"){
					$this->db->exec("INSERT INTO bizkimiz (adsoyad, fotograf, aciklama) 
										VALUES
									 ('".$this->bizkimiz->p_Panel->panelItemList[1]->text."',
									  './upload/".$this->bizkimiz->p_Panel->panelItemList[2]->filename."', 
									  '".$this->bizkimiz->p_Panel->panelItemList[3]->text."');");
									  
					Notification::success("Yeni kayıt başarıyla eklendi");
					$this->empty_fields();
				}
			}
		}
		else{ //edit
			if(!empty($this->bizkimiz->p_Panel->panelItemList[2]->filename)){
				if($this->bizkimiz->p_Panel->panelItemList[2]->upload("./upload/") == "true"){
					
					$stmt = $this->db->query("SELECT * FROM bizkimiz WHERE id='".$this->bizkimiz->p_Panel->panelItemList[0]->text."'");
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					/** delete old one */
					if(file_exists("../../".$row["fotograf"])){
						unlink("../../".$row["fotograf"]);
					}
					
					// update db
					$this->db->exec("UPDATE bizkimiz SET 
										adsoyad='".$this->bizkimiz->p_Panel->panelItemList[1]->text."',
										fotograf='./upload/".$this->bizkimiz->p_Panel->panelItemList[2]->filename."',
										aciklama='".$this->bizkimiz->p_Panel->panelItemList[3]->text."'
									 WHERE id='".$this->bizkimiz->p_Panel->panelItemList[0]->text."'");
					
					Notification::success($this->bizkimiz->p_Panel->panelItemList[0]->text." nolu kayıt başarıyla düzenlendi");
					$this->empty_fields();
				}
			}
			else{
				$this->db->exec("UPDATE bizkimiz SET 
									adsoyad='".$this->bizkimiz->p_Panel->panelItemList[1]->text."',
									aciklama='".$this->bizkimiz->p_Panel->panelItemList[3]->text."'
								 WHERE id='".$this->bizkimiz->p_Panel->panelItemList[0]->text."'");
								 
				Notification::success($this->bizkimiz->p_Panel->panelItemList[0]->text." nolu kayıt başarıyla düzenlendi");
				$this->empty_fields();
			}
		}
		
		$this->fill_datatable();
	}
	
	public function edit(){

		$stmt = $this->db->query("SELECT * FROM bizkimiz LIMIT ".($_POST["rowIndex"]-1).",1");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->bizkimiz->p_Panel->panelItemList[0]->text = $row["id"];
		$this->bizkimiz->p_Panel->panelItemList[1]->text = $row["adsoyad"];
		$this->bizkimiz->p_Panel->panelItemList[3]->text = $row["aciklama"];
		$this->bizkimiz->p_Panel->panelItemList[2]->required = "false";
	}
	
	public function delete(){
	
		$stmt = $this->db->query("SELECT * FROM bizkimiz LIMIT ".($_POST["rowIndex"]-1).",1");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->db->exec("DELETE FROM bizkimiz WHERE id='".$row["id"]."'");

		if(file_exists("../../".$row["fotograf"])){
			unlink("../../".$row["fotograf"]);
		}
		
		Notification::success($row["id"]." nolu kayıt başarıyla silindi");
		$this->empty_fields();
		$this->fill_datatable();
	}
	
	public function fill_datatable(){
	
		$stmt = $this->db->query("SELECT * FROM bizkimiz");
		$rows = $stmt->fetchAll();
		$this->bizkimiz->p_Panel->panelItemList[5]->dataset = $rows;
	}
	
	public function empty_fields(){
		
		$this->bizkimiz->p_Panel->panelItemList[0]->text = "";
		$this->bizkimiz->p_Panel->panelItemList[1]->text = "";
		$this->bizkimiz->p_Panel->panelItemList[2]->filename = "";
		$this->bizkimiz->p_Panel->panelItemList[3]->text = "";
	}
}