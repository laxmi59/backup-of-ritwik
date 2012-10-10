<?php
if($_POST['submit']){
extract($_POST);
	//$email = $email;
	$from = "rama";
	$subject = "test";
	$message = "test";


	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.WEBSITE_NAME. "\r\n";
	if(mail($email, $subject, $message ,$headers)){ echo "success";}else {echo "fail";}
}
	
?>
<form method="post">
<input type="text" name="email" /><input type="submit" name="submit" value="submit" />
</form>