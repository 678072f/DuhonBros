<?php 

$title = "User Management";
include_once "header.php";

if(!isset($_SESSION["userid"])) {
	header("location: index.php?page=login");
	exit();
}

include "config/dbh-class.php";
include "config/user-mgmt-class.php";

$userData = new UserManager();
	
$allUsers = $userData->getAllUserInfo();
$activeUsers = $userData->getActiveUserInfo();
$inactiveUsers = $userData->getInactiveUserInfo();

$numActiveUsers = $userData->getTotalUsers(1);
$numInactiveUsers = $userData->getTotalUsers(0);
$numTotalUsers = $numActiveUsers + $numInactiveUsers;

?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Users</h2>
			
			<p><?=$numTotalUsers ?> Total Users</p>
			
			<div class="nav-controls">
				<a href="index.php?page=administration">Back</a>
				<a href="index.php?page=adduser">New User</a>
			</div>
			
			<span class="usermgmt-view">
				<button onclick="showAllUsers()" name="all">ALL USERS</button>
				<button onclick="showActiveUsers()" name="active">ACTIVE USERS</button>
				<button onclick="showInactiveUsers()" name="inactive">INACTIVE USERS</button>
			</span>
			
			<div class = "user-mgmt-wrapper">
				<div class="all-users" id="all">
					<p><?php echo $numTotalUsers ?> Total Users</p>
					<table class="user-table">
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
						<?php foreach ($allUsers as $user): ?>					
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
									<p><?php echo $user['administrator']; ?></p>
								</td>
								<td>
									<p><?php echo $user['active']; ?></p>
								</td>
								<td>
									<p><?php echo $user['creation_date']; ?></p>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
						
				<div class="active-users" id="active">
					<p><?php echo $numActiveUsers ?> Active Users</p>
					<table class="user-table">
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
						<?php foreach ($activeUsers as $user): ?>
							<tr>
								<td>
									<a href="index.php?page=profile&id=<?php echo $user["id"]; ?>"><?php echo "DB" . $user["id"]; ?></a>
								</td>
								<td>
									<p><?php echo $user["fname"]; ?></p>
								</td>
								<td>
									<p><?php echo $user['lname']; ?></p>
								</td>
								<td>
									<p> <?php echo $user['username']; ?></p>
								</td>
								<td>
									<p><?php echo $user['administrator']; ?></p>
								</td>
								<td>
									<p><?php echo $user['active']; ?></p>
								</td>
								<td>
									<p><?php echo $user['creation_date']; ?></p>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>

				<div class="inactive-users" id="inactive">
					<p><?php echo $numInactiveUsers ?> Inactive Users</p>
					<table class="user-table">
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
						<?php foreach ($inactiveUsers as $user): ?>
							<tr>
								<td>
									<a href="index.php?page=profile&id=<?php echo $user["id"]; ?>"><?php echo "DB" . $user["id"]; ?></a>
								</td>
								<td>
									<p><?php echo $user["fname"]; ?></p>
								</td>
								<td>
									<p><?php echo $user['lname']; ?></p>
								</td>
								<td>
									<p> <?php echo $user['username']; ?></p>
								</td>
								<td>
									<p><?php echo $user['administrator']; ?></p>
								</td>
								<td>
									<p><?php echo $user['active']; ?></p>
								</td>
								<td>
									<p><?php echo $user['creation_date']; ?></p>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</td>
	</tr>
</table>

<script src="resources/js/user-table.js"></script>

<?php 
include_once "footer.php";
?>