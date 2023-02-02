<?php
	
	$title = "Edit Profile";
	include_once "header.php";
	
	
?>

<table class="main-content" align="center" width="90%">
	<tr>
		<td>
			<span class="edit-profile">
				<h2>User Profile
				<?php 
					if($userID == $_SESSION["userid"]) { 
						echo '- <a class="edit-profile" href="index.php?page=editprofile">Edit Profile</a>'; 
					} elseif($isAdmin == true) {
						echo '- <a class="edit-profile" href="index.php?page=editprofile">Edit Profile</a>'; 
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
			</table>
		</td>
	</tr>
</table>

<?php
	include_once "footer.php";
?>