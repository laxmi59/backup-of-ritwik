<?php 
session_start();

if( isset($_POST['submit'])) {
   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
		echo 'Thank you. Your message said "'.$_POST['message'].'"';
		unset($_SESSION['security_code']);
   } else {
		// Insert your code for showing an error message here
		echo 'Sorry, you have provided an invalid security code';
   }
} else {
?>

	<form action="form.php" method="post">
	<table border="1" align="center">
		<tr>
			<td><label for="name">Name: </label></td>
			<td><input type="text" name="name" id="name" /></td>
		</tr>
		<tr>
			<td><label for="email">Email: </label></td>
			<td><input type="text" name="email" id="email" /></td>
		</tr>
		<tr>
			<td><label for="message">Message: </label></td>
			<td><textarea rows="5" cols="30" name="message" id="message"></textarea></td>
		</tr>
		<tr>
			<td><label for="security_code">Security Code: </label></td>
			<td><img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /></td>
		</tr>
		<tr>
			<td><label for="Enter security_code">Enter Security Code: </label></td>
			<td><input id="security_code" name="security_code" type="text" /></td>
		</tr>
		<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Submit" /></td></tr>
	</table>
	</form>

<?php
	}
?>