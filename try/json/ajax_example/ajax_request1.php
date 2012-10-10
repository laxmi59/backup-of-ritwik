<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("lml",$con);

require_once "json/JSON.php";
$json = new Services_JSON();
	$select=mysql_query("SELECT * FROM `jos_article_comments` jac, `jos_content` jc where jac.art_id=jc.id"));
	//convert php object to json 
	while($row=mysql_fetch_object($select)){
		$value. = array('id'=>$row->id,'Article' => $row->title, 'To' => $row->to_mail, 'From' => $row->from_mail);
	}
	$output = $json->encode($value);
	
	print($output);
?>
