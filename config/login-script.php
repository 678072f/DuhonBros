<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Get Data
	$username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

	// Instantiate signupControl Class
	include "dbh-class.php";
	include "login-class.php";
	include "login-control-class.php";
	
	$loginuser = new LoginUserControl($username, $password);
	
	// Run error handlers and add user
	$loginuser->loginUser();
	
	// Go back to user list
	header("location: ../index.php?page=administration&error=none");
	exit();
}