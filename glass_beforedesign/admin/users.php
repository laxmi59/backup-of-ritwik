<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "../includes/config.php";
include "../includes/filenames.php";
include "../includes/functions.php";
include "../includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['admin_id']==''){ echo "<script>location.replace('".ADM_MAIN."')</script>";}
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
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function abc1(cid)
{
	window.location='users.php?status='+cid;
}
</script>
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr>
	<td valign="top">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td valign="top"><? include "header.php"?></td></tr>
	<tr>
		<td valign="top"><p>&nbsp; <?=$msg?></p>
		<table width="80%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>		
			<td class="txtstyle trpad"><div align="right">Users status</div></td>
			<td>&nbsp;</td>
			<td width="57%">
			<select name="gender" style="width:150px;" onchange="abc1(this.value)" >
				<? if($_GET['status']=='n'){?>
				<option value="n" selected="selected">New</option>
				<option value="a">Active</option>
				<option value="b">Blocked</option>
				<? }elseif($_GET['status']=='a'){?>
				<option value="n">New</option>
				<option value="a" selected="selected">Active</option>
				<option value="b">Blocked</option>
				<? }elseif($_GET['status']=='b'){?>
				<option value="n">New</option>
				<option value="a">Active</option>
				<option value="b" selected="selected">Blocked</option>
				<? }?>
            </select>		
			</td>
		</tr>
		<tr>
		  <td class="txtstyle trpad">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td class="txtstyle trpad">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
	    </table>	
		<table align="center" width="60%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="12%" class="txtstyle">User Id</td>
			<td width="23%" class="txtstyle">Name</td>
			<td width="19%" class="txtstyle">Username</td>
			<!--<td width="15%" class="txtstyle">Password</td>-->
			<!--<td width="12%" class="txtstyle">Discount</td>-->
			<td width="19%" class="txtstyle">Email</td>			
			<td width="27%" class="txtstyle" align="center">Action</td>
		</tr>
		<tr><td colspan="7">&nbsp;</td></tr>
		<?
			$prod=mysql_query("select * from ".USERS." where `user_type`='default' and `user_status`='$_GET[status]' limit $start,$q_limit" );
			$prod1=mysql_query("select * from ".USERS." where `user_type`='default' and `user_status`='$_GET[status]' ");
			//echo "select * from ".PRODUCT;
			$prodnum=mysql_num_rows($prod1);
			if($prodnum==''){
		?>
		<tr><td colspan="7"><div align="center" class="txtstyle">No Users found</div></td></tr>
		<tr> <td colspan="7">&nbsp;</td>	  </tr>
		<? }else{
			$filePath= ADM_USERS."?act=show_cat_prod&";
			for($i=1;$prod_result=mysql_fetch_array($prod);$i++){
		?>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$prod_result['user_fname']?></td>
			<td class="txtstyle1"><?=$prod_result['username']?></td>
			<!--<td class="txtstyle1"><?=$prod_result['password']?></td>
			<td class="txtstyle1"><?=$prod_result['user_discount']?></td>-->
			<td class="txtstyle1"><?=$prod_result['user_email']?></td>
			<td>
			  <div align="center">
			    <? if($_GET['status']=='n'){?>
			    <a href="../includes/admin_action.php?act=user_status&pid=<?=$prod_result['user_id']?>&status=a" class="a">Active</a>
			    <a href="../includes/admin_action.php?act=user_status&pid=<?=$prod_result['user_id']?>&status=b" class="a"> Block </a>
			        <? }elseif($_GET['status']=='a'){?>
			    <a href="../includes/admin_action.php?act=user_status&pid=<?=$prod_result['user_id']?>&status=b" class="a"> Block </a>
			        <? }elseif($_GET['status']=='b'){?>
			    <a href="../includes/admin_action.php?act=user_status&pid=<?=$prod_result['user_id']?>&status=a" class="a"> Active</a>
			    <a href="../includes/admin_action.php?act=user_del&pid=<?=$prod_result['user_id']?>" class="a"> Delete </a>
			        <? }?>
			      </div></td>
		</tr>
		<tr><td colspan="7">&nbsp;</td></tr>
		<? }?>
		<tr>
			<td colspan="7" align="center" class="txtstyle"><? paginate($start,$q_limit,$prodnum,$filePath,"");?></td>
		</tr>
		<? }?>
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>
