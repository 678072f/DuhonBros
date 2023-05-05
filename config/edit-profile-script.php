<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Get Data
    $userID = htmlspecialchars($_POST["userID"], ENT_QUOTES, 'UTF-8');
    $about = htmlspecialchars($_POST["about"], ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($_POST["status"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

	
	if($_POST["isadmin"]) {
		$admin = 1;
	} else {
		$admin = 0;
	}

	
	if($_POST["isactive"]) {
		$active = 1;
	} else {
		$active = 0;
	}

	// Include DBh Class
	include "dbh-class.php";
	
	// Include Administration Class
	include "administration-class.php";
	include "administration-control-class.php";

    // Inlcude User Manager Class
    include "user-mgmt-class.php";
	$userData = new UserManager();
	$profileData = $userData->getUserInfo($userID);
	$loggedInData = $userData->getUserInfo($_SESSION["userid"]);
	
	$isAdmin = $loggedInData[0]["administrator"];

    $username = $profileData[0]["username"];
    $fname = $profileData[0]["fname"];
	
	// Instantiate Administration Class
	$adminProfile = new AdminInfoControl($userID, $username, $fname);
	
	$adminProfile->updateProfileInfo($about, $status, $active, $admin);
    $userData->updateUserEmail($email, $userID);	
	
	// Go back to main page
	header("location: ../index.php?page=profile&id=$userID&error=none");

}