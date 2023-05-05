<?php

class AddUserControl extends AddUser {
	private $fname;
	private $lname;
	private $email;
	private $username;
	private $password;
	private $confirm_password;
	private $admin;
	private $active;
	
	public function __construct($fname, $lname, $email, $username, $password, $confirm_password, $admin, $active) {
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->confirm_password = $confirm_password;
		$this->admin = $admin;
		$this->active = $active;
	}
	
	public function addUser() {
		if($this->emptyInput() == false) {
			// Empty Input
			header("location: ../index.php?page=adduser&error=emptyinput");
			exit();
		}
		if($this->invalidUsername() == false) {
			// Invalid Username
			header("location: ../index.php?page=adduser&error=invalidusername");
			exit();
		}
		if($this->invalidEmail() == false) {
			// Invalid Email
			header("location: ../index.php?page=adduser&error=invalidemail");
			exit();
		}
		if($this->passwordMatch() == false) {
			// Passwords do not match
			header("location: ../index.php?page=adduser&error=passworderr");
			exit();
		}
		if($this->checkUserExists() == false) {
			// User already exists
			header("location: ../index.php?page=adduser&error=userexists");
			exit();
		}
		
		$this->setUser($this->fname, $this->lname, $this->email, $this->username, $this->password, $this->admin, $this->active);
	}
	
	private function emptyInput() {
		$result = true;
		
		if(empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->username) || empty($this->password) || empty($this->confirm_password)) {
			$result = false;
		} else {
			$result = true;
		}
		
		return $result;
	}
	
	private function invalidUsername() {
		$result = true;
		
		if(!preg_match("/^[a-zA-Z0-9_]*$/", $this->username)) {
			$result = false;
		} else {
			$result = true;
		}
		
		return $result;
	}
	
	private function invalidEmail() {
		$result = true;
		
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$result = false;
		} else {
			$result = true;
		}
		
		return $result;
	}
	
	private function passwordMatch() {
		$result = true;
		
		if($this->password !== $this->confirm_password) {
			$result = false;
		} else {
			$result = true;
		}
		
		return $result;
	}
	
	private function checkUserExists() {
		$result = true;
		
		if (!$this->checkUser($this->username, $this->email)) {
			$result = false;
		} else {
			$result = true;
		}
		
		return $result;
	}
	
	public function fetchUserId($username) {
		$userId = $this->getUserId($username);
		
		return $userId[0]["id"];
	}
}