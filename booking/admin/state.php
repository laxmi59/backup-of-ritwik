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
	<div align="center"><a href="state.php?act=new" class="b">Add New State</a></div>
	<div class="linebreak"></div>
		<table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
		<!--<tr><td colspan="3" align="right"><input type="button" name="export" value="Export" onclick="ff1('companies');" /></td></tr>-->
		<tr>
			<td width="29%" class="txtstyle">Sno</td>
			<td width="49%" class="txtstyle">State</td>
			<td width="22%" class="txtstyle">Action </td>
		</tr>
		<tr><td colspan="4">&nbsp;</td></tr>
		<? $ss=mysql_num_rows(mysql_query("select * from cal_state "));
		$ss_limit=mysql_query("select * from cal_state limit $start,$q_limit");
		if($ss==''){?>
		<tr>
		  <td colspan="4" align="center" class="errstyle">No States Found</td>
		</tr>
		<? }else{
		for($i=1;$sss=mysql_fetch_array($ss_limit);$i++){?>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$sss['name']?></td>
			<td><a href="../<?=ADMIN_DATA?>?act=state_delete&id=<?=$sss['id']?>" class="b">Delete</a></td>
		</tr>
		<tr><td class="linebreak"></td></tr>
		<? }?>
		<tr><td colspan="6" align="center" class="errstyle"><? paginate($start,$q_limit,$ss,"state.php?act=show&","");?></td></tr>
		<? }?>
	  </table>
	<? }?>
	<? if($_GET['act']=='new'){?>
	<form method="post" action="../<?=ADMIN_DATA?>?act=add_new_state&id=<?=$_GET['id']?>" onsubmit="return create_state(this)">
	<!--<form method="post" onsubmit="return create_state(this)">-->
	<div align="center" class="txtstylebig">Add New State</div>
	<div class="linebreak">
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</div>
	<table width="60%" align="center">
		<tr>
			<td class="txtstyle">State</td>
			<td>:</td>
			<td><input type="text" name="state" style="width:200px;" /></td>
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
