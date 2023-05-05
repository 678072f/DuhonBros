<?php 
	$title = "Add User";
	include_once "header.php";

	if(!isset($_SESSION["userid"])) {
		header("location: index.php?page=login");
		exit();
	}
?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Add User</h2>
			<p>Use this form to add a site manager account.</p>
			<div class="adduser">

				<a href="index.php?page=user-list">Return</a>

				<form action="config/adduser-script.php" method="post">
					<div class="form-group">
						<label>First Name: </label>
						<input type="text" name="fname">
					</div>
					<div class="form-group">
						<label>Last Name: </label>
						<input type="text" name="lname">
					</div>
					<div class="form-group">
						<label>Email: </label>
						<input type="text" name="email">
					</div>
					<div class="form-group">
						<label>Username: </label>
						<input type="text" name="username">
					</div>
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password">
					</div>
					<div class="form-group">
						<label>Confirm Password: </label>
						<input type="password" name="confirm_password">
					</div>
					<div class="form-group">
						<input type="checkbox" name="administrator[]" value="true">
						<label for="administrator">Admin?</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="active[]" value="true" checked>
						<label for="active">Active?</label>
					</div>
					<div class="form-group">
						<button type="submit" name="submit">SUBMIT</button>
						<button type="reset" name="reset">RESET</button>
					</div>
				</form>
			</div>
		</td>
	</tr>
</table>

<?php
	include_once "footer.php";
?>