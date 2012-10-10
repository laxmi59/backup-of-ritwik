<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("lml",$con);

require_once "json/JSON.php";
$json = new Services_JSON();
	$select=mysql_fetch_object(mysql_query("SELECT * FROM `jos_article_comments` jac, `jos_content` jc where jac.art_id=jc.id and jac.id=$_GET[id]"));
	//convert php object to json 
	$value = array('id'=>$select->id,'Article' => $select->title, 'To' => $select->to_mail, 'From' => $select->from_mail);
	$output = $json->encode($value);
	
	print($output);
?>
