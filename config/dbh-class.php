<?php
require_once 'credentials.php';

class DBh {
	private $host = 'localhost';
	private $db = 'duhonbros';
	private $user = USERNAME;
	private $pass = PASSWORD;
	private $charset = 'utf8mb4';
	
	protected function connect() {
		try {
			$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
			$dbh = new PDO($dsn, $this->user, $this->pass);
			return $dbh;			
		} 
		catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}