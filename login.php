<?php
$title = "Admin Login";
include "header.php";
?>

<table class="main-content" align="center" width="90%">
	<tr>
		<td>
			<h2>Administrator Login</h2>
			<span>
				<?php 
					$error = isset($_GET['error']);
					if(isset($_GET['error'])) {
						if($error == "wrongpassword" || $error == "usernotfound") {
							echo "Username or Password incorrect. Please try again.";
						}
					}
				?>
			</span>
			<div class="login">
				<form action="config/login-script.php" method="post">
					<div class="form-group">
						<label for="username">Username:</label> 
						<input type="text" placeholder="Enter Username" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" placeholder="Enter Password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="submit">LOGIN</button>
					</div>
				</form>
			</div>
		</td>
	</tr>
</table>

<?php
include "footer.php";
?>