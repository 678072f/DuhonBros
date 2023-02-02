<?php

function template_header($title) {
	echo <<<EOT
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8">
			<title>DuhonBros. Shop $title</title>
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
					</ul>
				</div>
			</div>
		</header>
		<main class="main-wrapper">
	EOT;
}

function template_footer() {
	$year = date('Y');
	echo "</main>
			<footer class='footer'>
				<div>
					<hr>
					<br>
				</div>
				<div class='footer'>
					<center><p>Copyright &copy; $year, DuhonBros. Shop.</p></center>
				</div>
				<div class='footer'>
					<a href='index.php?page=contact'>Contact</a>
					<a href='index.php?page=about'>About</a>
					<a href='index.php?page=contact'>Feedback</a>
				</div>
				<div class='footer'>";
				if(isset($_SESSION['userid'])) {
					echo "<a href='index.php?page=administration'>" . $_SESSION['username'] . "</a><br/><a href='config/logout.php'>LOGOUT</a>";
				} else {
					echo "<a href='index.php?page=login'>Admin Login</a>";
				}
					echo "</div>
			</footer>
		</body>
	</html>";
}