<?php
//database connect
class Db {
	
	public function connect(){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db_name = 'chat';
		
		$conn = new mysqli($host, $user, $pass, $db_name);
		return $conn;
	}
	public function query($state){
		$query = $this->connect()->query($state);
		return $query;
	}
	
}
$db = new Db;

?>