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
$id=$_REQUEST['id'];
if($_GET['id']){
$sss=mysql_fetch_array(mysql_query("select * from cal_users where user_id=$id;"));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function updatesite(str){ 
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
	return }
	document.getElementById('site').innerHTML = "Checking...";
	var field="state";
	var url="../includes/ajax.php"
	url=url+"?q="+str
	url=url+"&act="+field
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedpass 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChangedpass(){ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
		document.getElementById("site").innerHTML=xmlHttp.responseText; 
		//document.getElementById("hid2").value=xmlHttp.responseText;
	} 
}
function GetXmlHttpObject(){
	var xmlHttp=null;
	try{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}catch (e){
		//Internet Explorer
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  		}catch (e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
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
	<td width="10%">&nbsp;</td>
	<td width="80%" valign="top" height="450">
	<? if($_GET['act']=='show'){?>
	<table width="95%" align="center">
	  <tr>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td><div align="center"><a href="company.php?act=new" class="b">Add New Company</a></div></td>
	    </tr>
	  <tr><td>&nbsp;</td></tr></table>
		<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="9%" class="txtstyle">Sno</td>
			<td width="18%" class="txtstyle">Username</td>
			<td width="17%" class="txtstyle">Password</td>
			<td width="23%" class="txtstyle">Email Id</td>
			<td width="21%" class="txtstyle">Business Type</td>
			<td width="12%" class="txtstyle">Action </td>
		</tr>
		<tr><td colspan="7">&nbsp;</td></tr>
		<? $ss=mysql_num_rows(mysql_query("select * from `cal_company`"));
		$ss_limit=mysql_query("select * from `cal_company` limit $start,$q_limit");
		if($ss==''){?>
		<tr>
		  <td colspan="7" align="center" class="errstyle">No Companies Found</td>
		</tr>
		<? }else{
		for($i=1;$sss=mysql_fetch_array($ss_limit);$i++){
		?>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$sss['companyname']?></td>
			<td class="txtstyle1" style="text-transform:none"><?=$sss['password']?></td>
			<td class="txtstyle1"><?=$sss['company_mail']?></td>
			<td class="txtstyle1"><? if($sss['business_type']==1) echo "Normal"; elseif($sss['business_type']==2) echo "Bank";?></td>
			<td>
				<a href="company.php?&act=new&id=<?=$sss['id'];?>" class="b"><img title="Edit" alt="Edit" src="../images/edit.png" border="0" /></a>&nbsp;
				<a href="../<?=ADMIN_DATA?>?act=com_delete&id=<?=$sss['id'];?>" class="b"><img src="../images/delete.png" border="0" title="Delete" alt="Delete" /></a>	
				<!--<input type="image" src="../images/download.png" height="20" width="20" title="Download Bookings" alt="Download Bookings" name="print" value="Print" onclick="javascript:window.location='../includes/csv.php?act=company_print_admin&id=<?=$sss['id']?>'" />-->
			</td>
			
		</tr>
		<tr><td class="linebreak" colspan="7"></td></tr>
		<? }?>
		<tr><td colspan="7" align="center" class="errstyle"><? paginate($start,$q_limit,$ss,"company.php?act=show&","");?></td></tr>
		<? }?>
	  </table>
	<? }?>
	
	<? if($_GET['act']=='new'){?>
	<form method="post" action="../<?=ADMIN_DATA?>?act=add_new_com&id=<?=$_GET['id']?>" onsubmit="return create_user(this)">
	<div align="center" class="txtstylebig">Add New Company</div>
	<div class="linebreak">
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</div>
	<table width="90%" border="0" align="center" cellpadding="5" cellspacing="5">
		<tr>
			<td class="txtstyle">Username</td>
			<td>:</td>
			<td><input type="text" name="username" style="width:200px;" value="<?=$sss['username'];?>" /></td>
		</tr>
		<tr>
			<td class="txtstyle">Password</td>
			<td>:</td>
			<td><input type="password" name="password" style="width:200px;" value="<?=$sss['password']?>"/></td>
		</tr>
		<tr>
			<td class="txtstyle">Email Id</td>
			<td>:</td>
			<td><input type="text" name="user_mail" style="width:200px;" value="<?=$sss['user_mail']?>" /></td>
		</tr>
		<tr>
	  		<td class="txtstyle">Busenes type</td>
			<td>:</td>
			<td>
		<? if($sss['business_type']==1){?>
			<input type="radio" name="type" checked="checked" value="1" />Normal
			<input type="radio" name="type" value="2" />Bank
			<? }elseif($sss['business_type']==2){?>
			<input type="radio" name="type" value="1" />Normal
			<input type="radio" name="type"  checked="checked" value="2" />Bank
			<? }else{?>
			<input type="radio" name="type" value="1" />Normal
			<input type="radio" name="type" value="2" />Bank
			<? }?>
			</td>
		</tr>
		<tr><td colspan="3" align="center"><input type="submit" name="submit" value="submit" /></td></tr>
	</table>
	</form>
	<? }?>
	
	</td>
<td width="10%">&nbsp;</td>
</tr>
</table>
</body>
</html>
