<?php

class AddUser extends DBh {
	
	protected function setUser($fname, $lname, $email, $username, $password, $admin, $active) {
		$sql = 'INSERT INTO users (fname, lname, email, username, password, administrator, active) VALUES (?, ?, ?, ?, ?, ?, ?);';
		$stmt = $this->connect()->prepare($sql);
		
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		if(!$stmt->execute(array($fname, $lname, $email, $username, $hashedPassword, $admin, $active))) {
			$stmt = NULL;
			header("location: ../index.php?page=adduser&error=stmtfailed");
			exit();
		}
		
		$stmt = NULL;
	}
	
	protected function checkUser($username, $email) {
		$sql = 'SELECT username FROM users WHERE username = ? OR email = ?;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($username, $email))) {
			$stmt = NULL;
			header("location: ../index.php?page=adduser&error=stmtfailed");
			exit();
		}
		
		$resultCheck;
		if($stmt->rowCount() > 0) {
			$resultCheck = false;
		} else {
			$resultCheck = true;
		}
		
		return $resultCheck;
	}
	
	protected function getUserId($username) {
		$sql = "SELECT id FROM users WHERE username = ?;";
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($username))) {
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
}