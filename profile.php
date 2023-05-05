<?php

$title = "Profile";
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

$isAdmin = $profileData[0]["administrator"];
$userIsAdmin = $loggedInData[0]["administrator"];

$isActive = $profileData[0]["active"];

?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<span class="edit-profile">
				<h2>User Profile
				<?php 
					if($userID == $_SESSION["userid"] || $userIsAdmin == true) { 
						echo "- <a class='edit-profile' href='index.php?page=editprofile&id=$userID'>Edit Profile</a>"; 
					}
				?></h2>
			</span>
			<table class="profile-table">
				<tr>
					<td>
						<h4>Full Name:</h4>
					</td>
					<td>
						<p>
						<?php
							echo $profileData[0]["fname"] . ' ' . $profileData[0]["lname"];
						?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<h4>Email:</h4>
					</td>
					<td>
						<a href="mailto:<?php echo $profileData[0]["email"]; ?>"><?php echo $profileData[0]["email"]; ?></a>
					</td>
				</tr>
				<tr>
					<td>
						<h4>About:</h4>
					</td>
					<td>
						<p>
						<?php
							echo $adminProfileInfo->fetchAbout($userID);
						?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<h4>Admin:</h4>
					</td>
					<td>
						<p>
						<?php
							if($isAdmin == true) {
								echo "Yes";
							} else {
								echo "No";
							}
						?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<h4>Active:</h4>
					</td>
					<td>
						<p>
						<?php
							if($isActive == true) {
								echo "Yes";
							} else {
								echo "No";
							}
						?>
						</p>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php
	
	include_once "footer.php";
	
?>