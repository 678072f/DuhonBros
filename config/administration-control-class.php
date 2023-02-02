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
	
	public function updateProfileInfo($about, $status, $text) {
		// Error Handling
		if($this->emptyInputCheck($about, $status, $text) == true) {
			header("location: ../index.php?page=adminprofilesettings&error=emptyinput");
			exit();
		}
		
		// Update Profile Info
		$this->setNewProfileInfo($about, $status, $this->userId);
	}
	
	private function emptyInputCheck($about, $status, $text) {
		$result;
		
		if(empty($about) || empty($status) || empty($text)) {
			$result = true;
		} else {
			$result = false;
		}
		
		return $result;
	}
}