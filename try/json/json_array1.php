<?php 
$con=mysql_connect("localhost","root","");
mysql_select_db("lml",$con);

//$select=mysql_query("SELECT * FROM `jos_article_comments` jac, `jos_content` jc where jac.art_id=jc.id");

$arr = array();
$rs = mysql_query("SELECT * FROM jos_article_comments");
 
while($obj = mysql_fetch_object($rs)) {
	$arr[] = $obj;
}
 
echo '{"sample":'.json_encode($arr).'}';?>