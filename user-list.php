<?php 
	$title = "User Management";
	include_once "header.php";

	include "config/dbh-class.php";
	include "config/user-mgmt-class.php";
	$userData = new UserManager();
	
	$users = $userData->getAllUserInfo();
	$total_users = $userData->getTotalUsers();
?>

<table class="main-content" align="center" width="90%">
	<tr>
		<td>
			<h2>Users</h2>
			<p><?=$total_users ?> Users</p>
			<span><a href="index.php?page=administration">Back</a></span>
			<span class="usermgmt"><a href="index.php?page=adduser">New User</a></span>
			<span class="usermgmt-view">
				<button type="" name="all">ALL USERS</button>
				<button type="" name="active">ACTIVE USERS</button>
				<button type="" name="inactive">INACTIVE USERS</button>
			</span>
			<div class="user-wrapper">
				<table class="user-table" align="center">
					<tr>
						<td>
							<p><u><b>User ID</b></u></p>
						</td>
						<td>
							<p><u><b>First Name</b></u></p>
						</td>
						<td>
							<p><u><b>Last Name</b></u></p>
						</td>
						<td>
							<p><u><b>Username</b></u></p>
						</td>
						<td>
							<p><u><b>Admin?</b></u></p>
						</td>
						<td>
							<p><u><b>Active?</b></u></p>
						</td>
						<td>
							<p><u><b>Date Added</b></u></p>
						</td>
					</tr>
					<?php foreach ($users as $user): ?>					
						<tr>
							<td>
								<a href="index.php?page=profile&id=<?php echo $user["id"]; ?>"><?php echo "DB" . $user["id"]; ?></a>
							</td>
							<td>
								<p><?php echo $user['fname']; ?></p>
							</td>
							<td>
								<p><?php echo $user['lname']; ?></p>
							</td>
							<td>
								<p> <?php echo $user['username']; ?></p>
							</td>
							<td>
								<center><p><?php echo $user['administrator']; ?></p></center>
							</td>
							<td>
								<center><p><?php echo $user['active']; ?></p></center>
							</td>
							<td>
								<center><p><?php echo $user['creation_date']; ?></p></center>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</td>
	</tr>
</table>
<?php 
include_once "footer.php";
?>