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
<table width="100%" class="style2" cellpadding="0" cellspacing="0">	
<tr>
	<td colspan="2" align="center"><strong class="style1" >Recent job Posts</strong></td>
</tr>
<? 
	$list1=$a->recent();
	while($xx=mysql_fetch_array($list1)){
?>
<tr bgcolor="#FFFFFF"><td colspan="2">&nbsp;</td></tr>
<tr bgcolor="#FFFFFF">
	<td align="center"><img src="img/no_picture.gif" /></td>
	<td class="style8 trpad">
	<? print $prop->property2($xx['list_property'])." for ".$req->req1($xx['list_type'])."<br>".$xx['list_project']."<br>".$xx['list_addr'].",<br>"?>
	<? print $c->location2($xx['list_location']).",".$c->location12($xx['list_city'])?>
	<a href="myaccount.php?act=edit&id=<?=$xx['list_id']?>" class="del">Edit</a>
	</td>
</tr>
<tr bgcolor="#FFFFFF"><td colspan="2" style="border-bottom:1px solid #800000;">&nbsp;</td></tr>
<? }?>
</table>