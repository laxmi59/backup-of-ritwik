<?php
// ******************************************** Start of Spamer API ************************************************************
	$chspam = curl_init();
	$chspam_url="http://www.stopforumspam.com/api?ip=".$_SERVER['REMOTE_ADDR']."&api_key=nrsyph73wabq0z&f=json";
	//spammer ip
	//$chspam_url="http://www.stopforumspam.com/api?ip=91.232.96.12&api_key=nrsyph73wabq0z&f=json";
		
	curl_setopt($chspam, CURLOPT_URL, $chspam_url);
	curl_setopt($chspam, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($chspam, CURLOPT_HEADER, false);
	curl_setopt($chspam, CURLOPT_FOLLOWLOCATION, false);
	curl_setopt($chspam, CURLOPT_POST, 14);
		
	//execute post
	$chspam_res	= curl_exec($chspam);	
	$test=json_decode($chspam_res);
	//close connection
	curl_close($chspam);
	
	if($test->ip->frequency == 0){
		echo "valid";
	}else{
		echo "Your IP address matches a reported spam address.";exit;
	}
?>