<?
//////////////////////////////////////////////////////////////////////
 //include "class/class.php";
 include "dbcon.php";
 $a= new real_list();
 $b= new real_req();
 $c= new real_location();
 $d= new real_reg();
 $req=new req();
 $prop=new real_property();
 $x=new valid();
 //////////////////////////////////////////////////////////////////////
?>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<div align="center">&nbsp;</div>
<?
	$prop1=$prop->property1(1);
	while($prop2=mysql_fetch_array($prop1)){
	?>
<div style="background-color:#FFFFFF; padding-bottom:10px;" align="left">	<a class="b" href="result_all.php?pid=<?=$prop2['pid']?>&name=<?=$prop2['pname']?>&user=admin"><?=$prop2['pname']?></a></div>
<? }?>
<div style="background-color:#FFFFFF">&nbsp;</div>