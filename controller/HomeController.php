<?php

class HomeController{

	public $home;

	public function load(){
	
		session_start();
		if(!isset($_SESSION["valid_user"])){
			$this->logout();
		}
		$this->home->p_Panel->html = '<p style="line-height:150%;">Metreküp Tasarım Atölyesi İnş. San. Tic. Ltd. Şti.<br>
										Kozyatağı Bayar Cd. Yeniyol Sk. No :7/3 Kadıköy / İstanbul<br>
										T: +90 216 706 10 80 - 658 74 00 F: +90 216 658 77 06<br>
										E: info@metrekup.net</p>';
	}
	
	public function logout(){
		
		session_destroy();
		echo "<script>location='login';</script>";
	}
}