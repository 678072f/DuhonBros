<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Get Data
	$fname = htmlspecialchars($_POST["fname"], ENT_QUOTES, 'UTF-8');
	$lname = htmlspecialchars($_POST["lname"], ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
	$username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
	$confirm_password = htmlspecialchars($_POST["confirm_password"], ENT_QUOTES, 'UTF-8');
	if(isset($_POST["administrator"])) {
		$admin = true;
	} else {
		$admin = false;
	}
	
	if(isset($_POST["active"])) {
		$active = true;
	} else {
		$active = false;
	}

	// Include DBh Class
	include "dbh-class.php";
	
	// Include AddUserControl Class
	include "adduser-class.php";
	include "adduser-control-class.php";
	
	// Include Administration Class
	include "administration-class.php";
	include "administration-control-class.php";
	
	// Instantiate AddUserControl Class
	$adduser = new AddUserControl($fname, $lname, $email, $username, $password, $confirm_password, $admin, $active);
	// Run error handlers and add user
	$adduser->addUser();
	
	$userID = $adduser->fetchUserId($username);
	
	// Instantiate Administration Class
	$adminProfile = new AdminInfoControl($userID, $username, $fname);
	
	$adminProfile->defaultProfileInfo();	
	
	// Go back to main page
	header("location: ../index.php?page=user-list&error=none");
}