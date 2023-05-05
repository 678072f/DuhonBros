<?php

class AdminInfoControl extends AdminInfo {
	
	private $userId;
	private $username;
	private $fname;
	
	public function __construct($userId, $username, $fname) {
		$this->userId = $userId;
		$this->username = $username;
		$this->fname = $fname;
	}
	
	public function defaultProfileInfo() {
		$profileAbout = "Welcome " . $this->fname . "! This is the administration panel for DuhonBros.";
		$profileStatus = "Logged in as: " . $this->username;
		$this->createProfileInfo($profileAbout, $profileStatus, $this->userId);
	}
	
	public function updateProfileInfo($about, $status, $active, $admin) {
		// Error Handling
		if($this->emptyInputCheck($about, $status) == true) {
			header("location: ../index.php?page=editprofile&id=$this->userId&error=emptyinput");
			exit();
		}
		
		// Update Profile Info
		$this->setNewProfileInfo($about, $status, $this->userId, $active, $admin);
	}
	
	private function emptyInputCheck($about, $status) {
		$result = false;
		
		if(empty($about) || empty($status)) {
			$result = true;
		} else {
			$result = false;
		}
		
		return $result;
	}
}