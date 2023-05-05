<?php
	session_start();
	// Start session and include modules
	include 'config/dbconnect.php';
	
	// Connect to database (OLD)
	$pdo = pdo_connect_mysql();
	
	// Page routing
	$page = isset($_GET['page']) && file_exists($_GET['page']) . '.php' ? $_GET['page'] : 'home';
	
	include $page . '.php';