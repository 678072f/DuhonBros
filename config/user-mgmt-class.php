<?php

class UserManager extends DBh {
	
	public function getTotalUsers() {
		$sql = 'SELECT * FROM users;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute()) {
			$stmt = NULL;
			header("location: index.php?page=user-list&error=stmtfailed");
			exit();
		}
		
		$totalUserCount = $stmt->rowCount();
		
		return $totalUserCount;
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
	
	public function getInactiveUserInfo() {
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
}