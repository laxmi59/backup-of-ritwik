<? session_start();
//////////////////////////////////////////////////////////////////////
 include "class/class.php";
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
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table width="980" align="center" cellpadding="0" cellspacing="0" class="tabcolor">
<tr><td colspan="3"><? include "header.php"?></td></tr>
<tr><td colspan="3" class="linebreak"></td></tr>
<tr>
	<td>&nbsp;</td>
	<td align="center">&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td valign="top" width="20%" align="right"><? include "left.php"?></td>
	<td valign="top" width="65%" align="center">
	<? if($_GET['act']=='myreg'){
		include "myreg.php";
	   }elseif($_GET['act']=='fast1'){
	   include "fast1.php";
	   }elseif($_GET['act']=='show'){?>
	   <span class="style3"> Manage Listings</span><br />	<br />
	<table width="90%" cellpadding="0" cellspacing="0" class="innertab">
	<tr>
		<td align="center"><strong class="style3">Types of listings</strong></td>
		<td align="center"><strong class="style3">Active</strong></td>
		<td align="center"><strong class="style3">Expired</strong></td>
		<td align="center"><strong class="style3">Hold</strong></td>
		<td align="center"><strong class="style3">Deleted</strong></td>
	</tr>
	<tr class="linebreak"><td colspan="5"></td></tr>
	<tr class="tabcolor">
		<td style="padding-left:30px" class="style4">Basic listings</td>
		<td style="padding-left:30px"><a href="myaccount.php?act=active" class="b"><? print $a->active($uid); ?></a></td>
		<td style="padding-left:30px"><a href="myaccount.php?act=expired" class="b"><? print $a->expired($uid); ?></a></td>
		<td style="padding-left:30px"><a href="myaccount.php?act=hold" class="b"><? print $a->hold($uid); ?></a></td>
		<td style="padding-left:30px"><a href="myaccount.php?act=del" class="b"><? print $a->del($uid); ?></a></td>
	</tr>
	<tr class="linebreak" style="height:8px"><td colspan="5"></td></tr>
</table>
<? }else{
		include "right.php";}?>
	</td>
	<td width="15%">&nbsp;</td>
</tr>
<tr><td colspan="3" class="linebreak"></td></tr>
<tr><td colspan="3"><? include "footer.php"?></td></tr>
</table>