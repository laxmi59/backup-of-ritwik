<?php
$con=mysql_connect("localhost","root","");
mysql_select_db(,$con);


//$sel= mysql_query("SELECT id, area_id, memberid FROM `tbl_member_metropolitian` GROUP BY area_id, memberid");
$sel= mysql_query("SELECT memberid FROM `tbl_members`");
while($fet=mysql_fetch_array($sel)){
	$innersel=mysql_query("SELECT area_id, memberid FROM `tbl_member_metropolitian` where memberid = '$sel[memberid]' ");
	while($innerfet=mysql_fetch_array($innersel)){
		$innersel=mysql_query("SELECT area_id, memberid FROM `tbl_member_metropolitian` where memberid = '$sel[memberid]' ");
	}
}
?>