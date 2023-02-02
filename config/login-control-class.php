<?php

class LoginUserControl extends LoginUser {
	private $username;
	private $password;
	
	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}
	
	public function loginUser() {
		if($this->emptyInput() == false) {
			// Empty Input
			header("location: ../index.php?page=login&error=emptyinput");
			exit();
		}
		
		$this->getUser($this->username, $this->password);
	}
	
	private function emptyInput() {
		$result;
		
		if(empty($this->username) || empty($this->password)) {
			$result = false;
		} else {
			$result = true;
		}
		
		return $result;
	}
}