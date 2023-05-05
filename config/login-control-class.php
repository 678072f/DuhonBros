<?php

class LoginUserControl extends LoginUser {
	private $username;
	private $email;
	private $password;
	
	public function __construct($username, $email, $password) {
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}
	
	public function loginUser() {
		if($this->emptyInput() == false) {
			// Empty Input
			header("location: ../index.php?page=login&error=emptyinput");
			exit();
		}
		
		$this->getUser($this->username, $this->email, $this->password);
	}
	
	private function emptyInput() {
		$result = true;
		
		if(empty($this->username) || empty($this->password)) {
			$result = false;
		} else {
			$result = true;
		}
		
		return $result;
	}
}