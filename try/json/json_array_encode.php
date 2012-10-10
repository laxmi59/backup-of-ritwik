<?php 
$con=mysql_connect("localhost","root","");
mysql_select_db("lml",$con);

require_once "ajax_example/json/JSON.php";
$json = new Services_JSON();

$select=mysql_query("SELECT jc.title, jac.to_mail, jac.from_mail, jac.comment, jac.date FROM `jos_article_comments` jac, `jos_content` jc where jac.art_id=jc.id");
/*while($row=mysql_fetch_object($select)){
$arr=array(
	"Article" => $row->title,
	"To" => $row->to_mail, 
	"From" => $row->from_mail,
	"Comment" => $row->comment,
	"Date" => $row->date);
	
 $t=json_encode($arr);	

echo $t."<br>";
echo "<pre>";
var_dump(json_decode($t, true))."<br>";
echo "</pre>";

}
*/
$i=1;
while($row=mysql_fetch_array($select)){
	$t= json_encode($row);
	echo "<b>json_encoded row ".$i," : </b>".$t;
	$tt=json_decode($t, true);
	echo "<br><b>json_decoded row ".$i," : </b><pre>";
	var_dump($tt)."<br>";
	echo "</pre>";
$i++;
}
?>


