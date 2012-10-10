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
<script type="text/javascript">
function ff(table,col,val){
	window.location='../extra/csv.php?act1=exp&tab='+table+'&col='+col+'&val='+val;
}
function ff1(table){
	window.location='../extra/csv.php?act1=exp1&tab='+table;
}
</script>
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
	<div align="center"><a href="sites.php?act=new" class="b">Add New Site</a></div>
	<div class="linebreak"></div>
		<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="8%" class="txtstyle">Sno</td>
			<td width="22%" class="txtstyle">State</td>
			<td width="28%" class="txtstyle">Company</td>
			<td width="27%" class="txtstyle">Site</td>
			<td width="15%" class="txtstyle">Action </td>
		</tr>
		<tr><td colspan="5">&nbsp;</td></tr>
		<? $ss=mysql_num_rows(mysql_query("select * from `cal_site` "));
		$ss_limit=mysql_query("select * from cal_site limit $start,$q_limit");
		if($ss==''){?>
		<tr>
		  <td colspan="5" align="center" class="errstyle">No Sites Found</td>
		</tr>
		<? }else{
		for($i=1;$sss=mysql_fetch_array($ss_limit);$i++){
		$mcat=mysql_fetch_array(mysql_query("select * from cal_state where id='$sss[state]'"));
		$mcom=mysql_fetch_array(mysql_query("select * from cal_company where id='$sss[company]'"));
		?>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$mcat['name']?></td>
			<td class="txtstyle1"><?=$mcom['companyname']?></td>
			<td class="txtstyle1"><?=$sss['name']?></td>
			<td><a href="../<?=ADMIN_DATA?>?act=site_delete&id=<?=$sss['id']?>" class="b"><img src="../images/delete.png" border="0" title="Delete" alt="Delete" /></a><!--<input type="image" src="../images/download.png" height="20" width="20" title="Download Bookings" alt="Download Bookings" name="print" value="Print" onclick="javascript:window.location='../includes/csv.php?act=site_print_admin&id=<?=$sss['id']?>'" />--></td>
		</tr>
		<tr><td class="linebreak"></td></tr>
		<? }?>
		<tr><td colspan="6" align="center" class="errstyle"><? paginate($start,$q_limit,$ss,"sites.php?act=show&","");?></td></tr>
		<? }?>
	  </table>
	<? }?>
	<? if($_GET['act']=='new'){?>
	<form method="post" action="../<?=ADMIN_DATA?>?act=add_new_site&id=<?=$_GET['id']?>" onsubmit="return create_site(this)">
	<!--<form method="post" onsubmit="return create_site(this)">-->
	<div align="center" class="txtstylebig">Add New Site</div>
	<div class="linebreak">
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</div>
	<table width="60%" align="center">
		<tr>
			<td class="txtstyle">State</td>
			<td>:</td>
			<td>
			<select name="state" style="width:200px">
			<option>select</option>
			<? $st=mysql_query("select * from `cal_state` ");
			while($sss=mysql_fetch_array($st)){
			//$sct=mysql_fetch_array(mysql_query("select * from cats where root=2"));
			?>
				<option value="<?=$sss['id']?>"><?=$sss['name']?></option>
			<? }?>
			</select>
			</td>
		</tr>
		<tr><td class="linebreak"></td></tr>
		<tr>
			<td class="txtstyle">Company</td>
			<td>:</td>
			<td>
			<select name="company" style="width:200px">
			<option>select</option>
			<? $st=mysql_query("select * from cal_company");
			while($sss=mysql_fetch_array($st)){
			?>
				<option value="<?=$sss['id']?>"><?=$sss['companyname']?></option>
			<? }?>
			</select>
			</td>
		</tr>
		<tr><td class="linebreak"></td></tr>
		<tr>
			<td class="txtstyle">Site Name</td>
			<td>:</td>
			<td><input type="text" name="name" style="width:200px"/></td>
		</tr>
		<tr><td colspan="3" align="center"><input type="submit" name="submit" value="submit" /></td></tr>
	</table>
	</form>
	<? }?>
	
	</td>
<td width="20%">&nbsp;</td>
</tr>
</table>
</body>
</html>
