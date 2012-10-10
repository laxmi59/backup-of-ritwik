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
<script type="text/javascript" src="../js/reg.js"></script>
</head>
<script type="text/javascript">
function abc1(cid)
{
	window.location='seller.php?act=show_sellers&status='+cid;
}
</script>
<script type="text/javascript">
var xmlHttp
function updateName(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
document.getElementById('checked').innerHTML = " ";
var field="run";
var url="../includes/ajax.php"
url=url+"?q="+str
url=url+"&act="+field
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

}
function stateChanged() 
{ 

if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("checked").innerHTML=xmlHttp.responseText; 
 //document.getElementById("hid").value=xmlHttp.responseText;
 
 } 

}
function updateName1(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
document.getElementById('checked1').innerHTML = " ";
var field="rmail";
var url="../includes/ajax.php"
url=url+"?q="+str
url=url+"&act="+field
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged1
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

}
function stateChanged1() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("checked1").innerHTML=xmlHttp.responseText; 
 //document.getElementById("hid1").value=xmlHttp.responseText;
 
 } 

}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
</script>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr>
	<td valign="top">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td valign="top"><? include "header.php"?></td></tr>
	<tr>
		<td valign="top"><p>&nbsp; <?=$msg?></p>
		<? if($_GET['act']=='show_sellers'){?>
		<table width="80%" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="txtstyle trpad"><div align="right">Wholesaler Status</div></td>
            <td>&nbsp;</td>
            <td width="57%">
			<select name="gender" style="width:150px;" onchange="abc1(this.value)" >
                <? if($_GET['status']=='a'){?>
                <option value="a" selected="selected">Active</option>
                <option value="b">Blocked</option>
				<? }elseif($_GET['status']=='b'){?>
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
		<table width="80%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center"><a href="<?=ADM_SELLERS?>?act=new_prod" class="a">Add New Wholesaler Account</a></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
	    </table>	
		<table align="center" width="70%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="9%" class="txtstyle">Seller Id</td>
			<td width="14%" class="txtstyle">Name</td>
			<td width="14%" class="txtstyle">Username</td>
			<td width="16%" class="txtstyle">Password</td>
			<td width="13%" class="txtstyle">Discount</td>
			<td width="13%" class="txtstyle">Email</td>			
			<td width="21%" class="txtstyle" align="center">Action</td>
		</tr>
		<tr><td colspan="7">&nbsp;</td></tr>
		<?
			$prod=mysql_query("select * from ".USERS." where `user_type`='seller' and `user_status`='$_GET[status]' limit $start,$q_limit" );
			$prod1=mysql_query("select * from ".USERS." where `user_type`='seller' and `user_status`='$_GET[status]'");
			//echo "select * from ".PRODUCT;
			$prodnum=mysql_num_rows($prod1);
			if($prodnum==''){
		?>
		<tr><td colspan="7"><div align="center" class="txtstyle">No whole sellers found</div></td></tr>
		<tr> <td colspan="7">&nbsp;</td>	  </tr>
		<? }else{
			$filePath= ADM_SELLERS."?act=show_cat_prod&";
			for($i=1;$prod_result=mysql_fetch_array($prod);$i++){
		?>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$prod_result['user_fname']?></td>
			<td class="txtstyle1"><?=$prod_result['username']?></td>
			<td class="txtstyle1"><?=$prod_result['password']?></td>
			<td class="txtstyle1"><?=$prod_result['user_discount']?></td>
			<td class="txtstyle1"><?=$prod_result['user_email']?></td>
			<td>
				<div align="center"><a href="<?=ADM_SELLERS?>?act=new_prod&user_id=<?=$prod_result['user_id']?>" class="a"> Edit </a> | 
			    <a href="../includes/admin_action.php?act=user_del&pid=<?=$prod_result['user_id']?>" class="a"> Delete </a>			        </div></td>
		</tr>
		<tr><td colspan="7">&nbsp;</td></tr>
		<? }?>
		<tr>
			<td colspan="7" align="center" class="txtstyle"><? paginate($start,$q_limit,$prodnum,$filePath,"");?></td>
		</tr>
		<? }?>
		</table>
		<? }?>
		<? if($_GET['act']=='new_prod'){
		$name="New Wholesaler";
		if($_GET['user_id']<>''){
			$name="Edit Wholesaler";
			$prod1=mysql_fetch_array(mysql_query("select * from ".USERS." where user_id='$_GET[user_id]'"));
			$fname=$prod1['user_fname'];
			$uname=$prod1['username'];
			$dis=$prod1['user_discount'];
			$em=$prod1['user_email'];
		}
		if($_GET['val']){
			$prod1=explode(",",$_GET['val']);
			$fname=$prod1[0];
			$uname=$prod1[1];
			$dis=$prod1[2];
			$em=$prod1[3];
		}
		
		?>
		<form method="post" name="frm" action="../includes/admin_action.php?act=new_user&id=<?=$prod1['user_id']?>"  onsubmit="return seller_create(this)">
		<?php /*?><form method="post" name="frm" onsubmit="return seller_create(this)"><?php */?>
		<? //echo $_GET['val'];?>
		<table align="center" width="40%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" colspan="3" class="heading2"><?=$name?></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td width="33%" class="txtstyle">Name</td>
			<td width="5%">:</td>
			<td width="62%"><input type="text" name="user_fname" value="<?=$fname?>" /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Username</td>
			<td>:</td>
			<td><input type="text" name="username" value="<?=$uname?>"  onBlur="updateName(this.value);"  />
			<span id="checked" class="errstyle"><?=$_GET['msg1']?></span></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Password</td>
			<td>:</td>
			<td><input type="password" name="password" value=""  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Discount</td>
			<td>:</td>
			<td class="txtstyle"><input type="text" name="user_discount" maxlength="2" value="<?=$dis?>"  /> In %</td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Email</td>
			<td>:</td>
			<td><input type="text" name="user_email" value="<?=$em?>" onBlur="updateName1(this.value);"   />
			<span id="checked1" class="errstyle"><?=$_GET['msg2']?></span></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<? if($_GET['user_id']<>''){?>
		<tr>
			<td class="txtstyle">Status</td>
			<td>:</td>
			<td class="txtstyle">
			<? if($prod1['user_status']=='a'){?>
			<input type="radio" name="user_status" value="a" checked="checked" />Active
			<input type="radio" name="user_status" value="b" />Block
			<? }else{?>
			<input type="radio" name="user_status" value="a" />Active
			<input type="radio" name="user_status" value="b" checked="checked"  />Block
			<? }?>
			</td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<? }?>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="cat_submit" value="Add" />
				<input type="button" name="btn" onclick="javascript:window.location='<?=$ADM_SELLER?>?act=show_sellers'" value="Cancel" />
			</td>
		</tr>
		</table>
		</form>
		
	<? }?>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>
