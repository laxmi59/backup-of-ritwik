<?php
include_once("wp-load.php");

for($i=2000; $i<2020; $i++){
	$ins=mysql_query("insert into `labels` (`labelno`) values ($i)");
}
?>