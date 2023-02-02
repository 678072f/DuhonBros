<?php 

if(!isset($_SESSION["userid"])) {
	header("location: index.php?page=login");
	exit();
}

$title = "Administration";
include_once "header.php";

include "config/dbh-class.php";
include "config/administration-class.php";
include "config/administration-control-class.php";
include "config/administration-view-class.php";
$adminProfileInfo = new AdminInfoView();
?>

<table class="main-content" align="center" width="90%">
	<tr>
		<td>
			<h2>Administration</h2>
			
			<div class="admin-profile">
				<span class="admin-status">
					<p>
						<?php
							$adminProfileInfo->fetchStatus($_SESSION["userid"]);
						?>
					</p>
				</span>
				<span class="admin-about">
				<p>
					<?php
						$adminProfileInfo->fetchAbout($_SESSION["userid"]);
					?>
				</p>
				</span>
			</div>
			<div class="admin-controls">
				<a href="index.php?page=user-list">User Management</a>
				<a href="index.php?page=product-mgmt">Product Management</a>
			</div>
			
		</td>
	</tr>
</table>

<?php 
include_once "footer.php";
?>