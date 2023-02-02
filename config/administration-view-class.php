<?php

class AdminInfoView extends AdminInfo {
	
	public function fetchAbout($userId) {
		$adminProfileInfo = $this->getProfileInfo($userId);
		echo $adminProfileInfo[0]["profiles_about"];
	}
	
	public function fetchStatus($userId) {
		$adminProfileInfo = $this->getProfileInfo($userId);
		echo $adminProfileInfo[0]["profiles_status"];
	}
	
	public function fetchText($userId) {
		$adminProfileInfo = $this->getProfileInfo($userId);
		echo $adminProfileInfo[0]["users_id"];
	}
	
}