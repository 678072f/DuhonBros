<?php
$year = date('Y');
?>

</main>
	<footer class='footer'>
		<div>
				<hr>
				<br>
			</div>
			<div class='footer'>
				<center><p>Copyright &copy; <?=$year; ?>, DuhonBros. Shop.</p></center>
			</div>
			<div class='footer'>
				<a href='index.php?page=contact'>Contact</a>
				<a href='index.php?page=about'>About</a>
				<a href='index.php?page=contact'>Feedback</a>
			</div>
			<div class='footer'>
				<?php
					if(isset($_SESSION['userid'])) {
				?>
				<a href='index.php?page=administration'><?php echo $_SESSION['username']; ?></a><br/>
				<?php
					} else {
				?>
				<a href='index.php?page=login'>Admin Login</a>
				<?php
					}
				?>
				
			</div>
		</footer>
	</body>
</html>