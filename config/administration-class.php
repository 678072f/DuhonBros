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

	protected function setNewProfileInfo($profile_about, $profile_status, $userId, $active, $admin) {
		$sql1 = "UPDATE profiles SET profiles_about = ?, profiles_status = ? WHERE users_id = ?;";
		$stmt1 = $this->connect()->prepare($sql1);

		$sql2 = "UPDATE users SET administrator = ?, active = ? WHERE id = ?;";
		$stmt2 = $this->connect()->prepare($sql2);
		
		if(!$stmt1->execute(array($profile_about, $profile_status, $userId))) {
			$stmt1 = NULL;
			header("location: index.php?page=administration&error=stmtfailed");
			exit();
		}

		if(!$stmt2->execute(array($admin, $active, $userId))) {
			$stmt2 = NULL;
			header("location: index.php?page=administration&error=stmtfailed");
			exit();
		}
		
		$stmt1 = NULL;
		$stmt2 = NULL;
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