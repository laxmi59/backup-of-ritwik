<?php
include_once("wp-load.php");
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php'); 
session_start();
unset($_SESSION['userid']);
wp_redirect(get_option('siteurl') . '/get-started');exit;
?>
