<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
function portalNameChk(reg){
//alert(reg);
 jQuery.ajax({type: "POST",url: "valid.php",data: 'pname='+ reg, 
 success: function(res1){
 //alert("test");
  $("#pname1chk1").replaceWith("<div id='pname1chk1'>"+res1+"</div>");
 }
 });
}
</script>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("dev2cap", $con);
$arr=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

foreach($arr as $value){
	//$pagi.= "<a href='index.php?sort=$value'".$value.">".$value."</a> | ";
	$test='"'.$value.'"';
	$pagi.= "<a href='javascript:void(0)' onclick='portalNameChk($test)'>".$value."</a> | ";
}
echo substr($pagi,0, strlen($pagi)-2);
echo "<br>";

?>
<div id='pname1chk1'>
<?php
$sort="a%";
$qry="select * from cap_program where program_title like '".$sort."' order by program_title asc";
$result=mysql_query($qry);
while($row=mysql_fetch_array($result)){
	$res.= $row['program_title']."<br>";
}
echo $res;
?>
</div>
 


