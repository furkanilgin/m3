<?php

class AccountController{

	public $account;

	public function load(){
	
		session_start();
		if(!isset($_SESSION["valid_user"])){
			$this->logout();
		}
	}
	
	public function save(){
	
	}
	
	public function logout(){
		
		session_destroy();
		echo "<script>location='login';</script>";
	}
}