<?php
//get the username
 $username = trim(strtolower($_POST['username']));
//mysql query to select field username if it's equal to the username that we check '
$result = array("rama","devi");
//if number of rows fields is bigger them 0 that means it's NOT available '
if(in_array($username,$result)){
	echo 1;
}else{
	echo 0;
}
?>