<?php

class LoginUser extends DBh {
	
	protected function getUser($username, $email, $password) {
		$sql = 'SELECT password FROM users WHERE username = ? OR email = ?;';
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($username, $email))) {
			$stmt = NULL;
			header("location: ../index.php?page=login&error=stmtfailed");
			exit();
		}
		
		if($stmt->rowCount() == 0) {
			$stmt = NULL;
			header("location: ../index.php?page=login&error=usernotfound");
			exit();
		}
		
		$passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$checkPassword = password_verify($password, $passwordHashed[0]["password"]);
		
		if($checkPassword == false) {
			$stmt = NULL;
			header("location: ../index.php?page=login&error=wrongpassword");
			exit();
		} elseif($checkPassword == true) {
			$sql = "SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;";
			$stmt = $this->connect()->prepare($sql);
			
			if(!$stmt->execute(array($username, $username, $password))) {
			$stmt = NULL;
			header("location: ../index.php?page=login&error=stmtfailed");
			exit();
			}
			
			if($stmt->rowCount() == 0) {
				$stmt = NULL;
				header("location: ../index.php?page=login&error=usernotfound");
				exit();
			}
			
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			session_start();
			$_SESSION["userid"] = $user[0]["id"];
			$_SESSION["username"] = $user[0]["username"];
			$_SESSION["fname"] = $user[0]["fname"];
			$_SESSION["isadmin"] = $user[0]["administrator"];	
			$stmt = NULL;
		}
		
		$stmt = NULL;
	}
	
} 