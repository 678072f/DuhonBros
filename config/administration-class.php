<?php

class AdminInfo extends DBh {
	
	protected function getProfileInfo($userId) {
		$sql = "SELECT * FROM profiles WHERE users_id = ?;";
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($userId))) {
			$stmt = NULL;
			header("location: index.php?page=administration&error=stmtfailed");
			exit();
		}
		
		if($stmt->rowCount() == 0) {
			$stmt = NULL;
			header("location: index.php?page=administration&error=profilenotfound");
			exit();
		}
		
		$profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $profileData;
	}

	protected function setNewProfileInfo($profile_about, $profile_status, $userId) {
		$sql = "UPDATE profiles SET profiles_about = ?, profiles_status = ? WHERE users_id = ?;";
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($profile_about, $profile_status, $userId))) {
			$stmt = NULL;
			header("location: index.php?page=administration&error=stmtfailed");
			exit();
		}
		
		$stmt = NULL;
	}
	
	protected function createProfileInfo($profile_about, $profile_status, $userId) {
		$sql = "INSERT INTO profiles (profiles_about, profiles_status, users_id) VALUES (?, ?, ?);";
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($profile_about, $profile_status, $userId))) {
			$stmt = NULL;
			header("location: index.php?page=administration&error=stmtfailed");
			exit();
		}
		
		if($stmt->rowCount() == 0) {
			$stmt = NULL;
			header("location: index.php?page=administration&error=profilenotfound");
			exit();
		}
		
		$stmt = NULL;
	}


}