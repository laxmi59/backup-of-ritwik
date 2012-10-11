<?php
error_reporting(0);
$email = "test17sep2012@yopmail.com";
$icontact = saveInIcontact($email);

function saveInIcontact($email){
	$ch2 = curl_init();
	$icontact_url="http://app.icontact.com/icp/signup.php";
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
		echo "Please enter valid email";
		exit;
	}else{
		$newsletter_data_post="fields_email=".$email."&listid=33877&specialid:33877=XCSX&clientid=144974&formid=2661&reallistid=1&doubleopt=0";
		//set the url, number of POST vars, POST data
		curl_setopt($ch2, CURLOPT_URL, $icontact_url);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_HEADER, true);
		curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch2, CURLOPT_POST, 14);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $newsletter_data_post);			
		//execute post
		$result2	= curl_exec($ch2);		
		//close connection
		curl_close($ch2);		
	}
}
?>