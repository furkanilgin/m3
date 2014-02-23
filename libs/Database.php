<?php

class Database{

	public static function connect(){
	
		$connection = mysql_connect("localhost","root","") or 
		die("Unable to connect to MySQL");
		$result = mysql_select_db("metrekup",
		$connection) or die("Veritabanina Baglanilamadi.");

		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET COLLATION_CONNECTION = 'utf8_bin'");
	}

}