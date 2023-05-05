<?php

class UserManager extends DBh {
	
	public function getTotalUsers($isActive) {
		$sql = 'SELECT * FROM users WHERE active = ?;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($isActive))) {
			$stmt = NULL;
			header("location: index.php?page=user-list&error=stmtfailed");
			exit();
		}
		
		$userCount = $stmt->rowCount();
		
		return $userCount;
	}
	
	public function getAllUserInfo() {
		$sql = 'SELECT * FROM users;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute()) {
			$stmt = NULL;
			header("location: index.php?page=user-list&error=stmtfailed");
			exit();
		}
		
		$userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $userData;
	}
	
	public function getActiveUserInfo() {
		$sql = 'SELECT * FROM users WHERE active = ?;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array(1))) {
			$stmt = NULL;
			header("location: index.php?page=user-list&error=stmtfailed");
			exit();
		}
		
		$userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $userData;
	}
	
	public function getInactiveUserInfo() {
		$sql = 'SELECT * FROM users WHERE active = ?;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array(0))) {
			$stmt = NULL;
			header("location: index.php?page=user-list&error=stmtfailed");
			exit();
		}
		
		$userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $userData;
	}
	
	public function getUserInfo($userId) {
		$sql = 'SELECT * FROM users WHERE id = ?;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($userId))) {
			$stmt = NULL;
			header("location: index.php?page=user-list&error=stmtfailed");
			exit();
		}
		
		$userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $userData;
	}

	public function updateUserEmail($email, $userId) {
		$sql = "UPDATE users SET email = ? WHERE id = ?;";
		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute(array($email, $userId))) {
			$stmt = NULL;
			header("location: index.php?page=editprofile&id=$userId&error=stmtfailed");
			exit();
		}

		$stmt = NULL;
	}
}