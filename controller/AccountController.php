<?php

class AccountController extends Controller{

	public $account;
	private $row;

	public function load(){
	
		parent::load();
		if(empty($_POST)){
			$stmt = $this->db->query("SELECT * FROM users LIMIT 1");
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->account->p_Panel->panelItemList[0]->text = $row["username"];
			$this->account->p_Panel->panelItemList[1]->text = $row["password"];
			$this->account->p_Panel->panelItemList[2]->text = $row["password"];
		}
	}

	public function save(){
			
		if($this->account->p_Panel->panelItemList[1]->text == $this->account->p_Panel->panelItemList[2]->text){
			$this->db->exec("UPDATE users SET 
								username='".$this->account->p_Panel->panelItemList[0]->text."', 
								password='".$this->account->p_Panel->panelItemList[1]->text."'");
								
			Notification::success("Kullanıcı bilgileri başarıyla değiştirildi");
		}
		else{
			Notification::error("Şifreler uyuşmuyor!");
		}
	}
}