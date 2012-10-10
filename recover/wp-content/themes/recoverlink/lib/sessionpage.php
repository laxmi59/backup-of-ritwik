<?php
include_once ('D:/wamp/www/recoverlink/wp-load.php'); 
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');

session_start();
//CHECKING FOR WHETHER SESSION IS EXIST OR NOT 
	 if(!isset($_SESSION['userid']))
	{
	 wp_redirect(get_option('siteurl') . '/get-started');exit;
	  exit;
 	}
?>