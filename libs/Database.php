<?php

class Database{

	public static function connect(){
	
		$db = new PDO('mysql:host=localhost;dbname=metrekup;charset=utf8', 'root', '');
		$db->query("SET NAMES 'utf8'");
		$db->query("SET COLLATION_CONNECTION = 'utf8_bin'");
		
		return $db;
	}

}