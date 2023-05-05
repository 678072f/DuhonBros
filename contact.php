<?php 
$title = "Contact Us";
include_once "header.php";
?>
<table class="main-content" align="center" width="90%">
	<tr>
		<td>
			<h2>Contact Form</h2>
			<p>Submit any questions you have about us and we will get back to you soon!</p>
			<form class="contact-form" method="post">
				<table>
					<tr>
						<td>
							<label for="fname">First Name:</label>
						</td>
						<td>
							<input type="text" id="fname" name="fname" required="true">
						</td>
					</tr>
					<tr>
						<td>
							<label for="lname">Last Name:</label>
						</td>
						<td>
							<input type="text" id="lname" name="lname" required="true">
						</td>
					</tr>
					<tr>
						<td>
							<label for="email">Email:</label>
						</td>
						<td>
							<input type="email" id="email" name="email" required="true">
						</td>
					</tr>
					<tr>
						<td>
							<label for="message">Message:</label>
						</td>
						<td>
							<input type="text" id="message" name="message" maxlength="1000" required="true" width="300px" height="200px">
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td  align="right">
							<input type="submit" name="Submit-Message">
						</td>
					</tr>
				</table>				
			</form>
		</td>
	</tr>
</table>
<?php 
include_once "footer.php";
?>