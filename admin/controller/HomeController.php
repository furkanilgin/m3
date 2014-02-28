<?php

class HomeController extends Controller{

	public $home;

	public function load(){
	
		parent::load();
		
		$this->home->p_Panel->html = '<p style="line-height:150%;">Metreküp Tasarım Atölyesi İnş. San. Tic. Ltd. Şti.<br>
										Kozyatağı Bayar Cd. Yeniyol Sk. No :7/3 Kadıköy / İstanbul<br>
										T: +90 216 706 10 80 - 658 74 00 F: +90 216 658 77 06<br>
										E: info@metrekup.net</p>';
	}
}