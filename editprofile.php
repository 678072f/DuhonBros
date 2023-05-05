<?php
	
	$title = "Edit Profile";
	include_once "header.php";
	
	if(!isset($_SESSION["userid"])) {
		header("location: index.php?page=login");
		exit();
	}
	
	include "config/dbh-class.php";
	include "config/administration-class.php";
	include "config/administration-control-class.php";
	include "config/administration-view-class.php";
	$adminProfileInfo = new AdminInfoView();
	
	$userID = $_GET["id"];
	
	include "config/user-mgmt-class.php";
	$userData = new UserManager();
	$profileData = $userData->getUserInfo($userID);
	$loggedInData = $userData->getUserInfo($_SESSION["userid"]);
	
	$isAdmin = $loggedInData[0]["administrator"];

	$userIsAdmin = $profileData[0]["administrator"];
	$isActive = $profileData[0]["active"]
?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Edit User Profile</h2>
			<form class="edit-profile" action="config/edit-profile-script.php" method="post">
				<table class="edit-profile-table">
					<tr>
						<td>
							<h4>Full Name:</h4>
							<p>UserID</p>
						</td>
						<td>
							<p>
							<?php
								echo $profileData[0]["fname"] . ' ' . $profileData[0]["lname"];
							?>
							</p>
							<input type="text" name="userID" value=<?php echo $userID; ?> readonly>
						</td>
					</tr>
					<tr>
						<td>
							<h4>Email:</h4>
						</td>
						<td>
							<input type="text" name="email" placeholder="email" value="<?php echo $profileData[0]["email"]; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4>About:</h4>
						</td>
						<td>
							<textarea name="about" rows="10" cols="100" placeholder="Profile About Info"><?php echo $adminProfileInfo->fetchAbout($userID); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<h4>Status:</h4>
						</td>
						<td>
						<textarea name="status" rows="10" cols="100" placeholder="Profile Status Info"><?php echo $adminProfileInfo->fetchStatus($userID); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<h4>Admin:</h4>
						</td>
						<td>
							<input type="checkbox" name="isadmin" <?php echo ($userIsAdmin ? "checked" : ""); ?>>Admin</input>
						</td>
					</tr>
					<tr>
						<td>
							<h4>Active:</h4>
						</td>
						<td>
							<input type="checkbox" name="isactive" <?php echo ($isActive ? "checked" : ""); ?>>Active</input>
						</td>
					</tr>
				</table>

				<div class="edit-profile-button">
					<button type="submit" name="submit">Save Profile</button>
					<a href="index.php?page=profile&id=<?php echo $userID ?>">Cancel</a>
				</div>
			</form>
		</td>
	</tr>
</table>

<?php
	include_once "footer.php";
?>