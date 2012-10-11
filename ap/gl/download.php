<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	set_time_limit(0);
	$server 	= 	'localhost';
	$username	=	'affiliateprogram';
	$password	=	'damntheman4';
	$db			=	'geolocation';
	mysql_connect($server,$username,$password);
	mysql_select_db($db);
	mysql_query("TRUNCATE TABLE geo") or die(mysql_error());
	ini_set("memory_limit","32M");
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	//download file
	#$test = system('wget software77.net/geo-ip?DL=2 -O IpToCountry.csv.zip',$output);
	#$test = system('unzip IpToCountry.csv.zip',$output);
	$filename = "IpToCountry.csv";
	#$file = file_get_contents($filename);
	#$lines = explode("\n",$file);
	$lines = file($filename);
	foreach($lines as $l) {
		if(substr($l,0,1)!="#") {
			$r = explode(',',str_replace('"',"",$l));
			$query = "INSERT INTO geo (ip_start,ip_end,country) VALUES ('$r[0]','$r[1]','$r[4]')";
			echo $query."<br />";
			$results = mysql_query($query) or die(mysql_error());
		}
	}
?>