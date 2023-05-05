<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8">
			<title>DuhonBros. Shop <?=$title; ?></title>
			<link rel="stylesheet" href="../resources/css/styles.css">
		</head>
		<body>
		<header>
			<div class="header">
				<a href="index.php"><img src="../resources/images/logo.png" alt="DuhonBros Logo" align="right" height="120px" width="auto"></a>
				<br>
				<br>
				<br>
				<h1>DuhonBros. Shop</h1>
				<br>
					
				<div class="navbar">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?page=products">Products</a></li>
						<li><a href="index.php?page=about">About Us</a></li> 
						<li><a href="index.php?page=contact">Contact Us</a></li>
						<?php
							if(isset($_SESSION["userid"])) {
						?>
								<li><a href='index.php?page=administration'><?php echo $_SESSION['username']; ?></a></li>
								<li><a href='config/logout.php'>LOGOUT</a></li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
		</header>
		<main class="main-wrapper">