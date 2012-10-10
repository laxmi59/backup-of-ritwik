<? session_start();

////////////////   		includes			/////////////////////////////////////////
include "../includes/config.php";
include "../includes/filenames.php";
include "../includes/functions.php";
include "../includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['admin_id']==''){ echo "<script>location.replace('".ADM_HOME."')</script>";}
require_once("../includes/pagination.php");
$q_limit = 10;
$errMsg = 0;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
}
else
{
	$start = 0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/reg.js"></script>
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr>
	<td colspan="3"><? include 'header.php'?></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td width="20%">&nbsp;</td>
	<td width="60%" valign="top" height="450">
	<? if($_GET['act']=='show'){?>
	<div align="center"><a href="service.php?act=new" class="b">Add New Services</a></div>
	<div class="linebreak"></div>
		<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="19%" class="txtstyle">Sno</td>
			<td width="27%" class="txtstyle">Service</td>
			<!--<td width="19%" class="txtstyle">customer info </td>
			<td width="17%" class="txtstyle">facts info </td>-->
			<td width="18%" class="txtstyle">Action
			<!--<input type="button" name="export" value="Export" onclick="ff1('companies');" />-->		  </td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<? $ss=mysql_num_rows(mysql_query("select * from cal_services "));
		$ss_limit=mysql_query("select * from cal_services limit $start,$q_limit");
		if($ss==''){?>
		<tr>
		  <td colspan="6" align="center" class="errstyle">No Services Found</td>
		</tr>
		<? }else{
		for($i=1;$sss=mysql_fetch_array($ss_limit);$i++){?>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$sss['name']?></td>
			<!--<td><a href="../includes/csv.php?act=down1&name=consumer_info&id=<?=$sss['id']?>"><img src="../images/images.jpg" width="59" height="57" border="0" /></a></td>
			<td><a href="../includes/csv.php?act=down1&name=facts_info&id=<?=$sss['id']?>"><img src="../images/images.jpg" width="59" height="57" border="0" /></a></td>-->
			<td>
				<a href="service.php?act=new&id=<?=$sss['id']?>" class="b"><img title="Edit" alt="Edit" src="../images/edit.png" border="0" /></a>&nbsp;
				<a href="../<?=ADMIN_DATA?>?act=service_delete&id=<?=$sss['id']?>" class="b"><img src="../images/delete.png" border="0" title="Delete" alt="Delete" /></a>	<!--<input type="image" src="../images/download.png" height="20" width="20" name="print" title="Download Bookings" alt="Download Bookings" value="Print" onclick="javascript:window.location='../includes/csv.php?act=service_print_admin&id=<?=$sss['id']?>'" />-->		</td>
		</tr>
		<tr><td class="linebreak" colspan="6"></td></tr>
		<? }?>
		<tr><td colspan="8" align="center" class="errstyle"><? paginate($start,$q_limit,$ss,"service.php?act=show&","");?></td></tr>
		<? }?>
	  </table>
	<? }?>
	<? if($_GET['act']=='new'){
	if($_GET['id']){
		$ser=mysql_fetch_array(mysql_query("select * from cal_services where id=$_GET[id]"));
	}
	?>
	<form method="post" action="../<?=ADMIN_DATA?>?act=add_new_service&ser_id=<?=$ser['id']?>" onsubmit="return create_service(this)" enctype="multipart/form-data">
	<?php /*?><form method="post" onsubmit="return create_service(this)"><?php */?>
	<div align="center" class="txtstylebig">Add New Service</div>
	<div class="linebreak">
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</div>
	<table width="70%" align="center">
		<tr>
			<td class="txtstyle">Name</td>
			<td>:</td>
			<td><input type="text" name="service" value="<?=$ser['name']?>" style="width:200px" /></td>
		</tr>
		<tr><td colspan="3" class="linebreak"></td></tr>
		<tr>
			<td class="txtstyle">Consumer Info </td>
			<td>:</td>
			<td><input type="file" name="consumer_info" /></td>
		</tr>
		<tr><td colspan="3" class="linebreak"></td></tr>
		<tr>
			<td class="txtstyle">Facts & Questions</td>
			<td>:</td>
			<td><input type="file" name="facts_info" /></td>
		</tr>
		<tr><td colspan="3" class="linebreak"></td></tr>
		<tr>
			<td class="txtstyle">Consent form </td>
			<td>:</td>
			<td><input type="file" name="consent_info" /></td>
		</tr>
		<tr><td colspan="3" class="linebreak"></td></tr>
		<tr>
			<td class="txtstyle">Additional info </td>
			<td>:</td>
			<td><input type="file" name="additional_info" /></td>
		</tr>
		<tr><td colspan="3" class="linebreak"></td></tr>
		<tr>
			<td class="txtstyle"><p>&nbsp; </p></td>
			<td><p>&nbsp; </p></td>
			<td><p>&nbsp; </p></td>
		</tr>
		<tr><td colspan="3" align="center"><input type="submit" name="submit" value="submit" /></td></tr>
	</table>
	</form>
<!--	<iframe src="sree.php" scrolling="no" frameborder="0" width="480px" style="position:relative; top:-60px; left:90px;" height="25px;">-->
	<? }?>
	
	</td>
<td width="20%">&nbsp;</td>
</tr>
</table>

</body>
</html>
