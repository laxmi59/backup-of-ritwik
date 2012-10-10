<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/reg.js"></script>
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
document.getElementById('checked').innerHTML = "Checking...";
var field="run";
var url="includes/ajax.php"
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
document.getElementById('checked1').innerHTML = "Checking...";
var field="rmail";
var url="includes/ajax.php"
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
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="sitewidth">
<tr>
	<td valign="top">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="">
	<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
	<tr>
		<td valign="top"><p>&nbsp; <?=$msg?></p>
		<? $prod1=explode(",",$_GET['val']);?>
		<form method="post" name="frm" action="includes/user_action.php?act=new_user&pid=<?=$_GET['pid']?>" onsubmit="return user_reg(this)" >
		<!--<form method="post" name="reg" onsubmit="return user_reg(this)" >-->
		<table align="center" width="55%" border="0" cellpadding="0" cellspacing="0">
		<tr><td colspan="3" class="mainhead" align="center">Registration Form</td></tr>
		<tr>
		  <td colspan="3" class="txtstyle">&nbsp;</td>
		  </tr>
		<tr> <td colspan="3" class="heading1">Login Information</td></tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle" valign="top">Username</td>
			<td valign="top">:</td>
			<td valign="top">
				<input type="text" name="username" value="<?=$prod1[0]?>"  onBlur="updateName(this.value);"  />
				<span id="checked" class="errstyle"><?=$_GET['msg1']?></span>
			</td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Password</td>
			<td>:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Confirmation Password</td>
			<td>:</td>
			<td><input type="password" name="rpassword" /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr> <td colspan="3" class="heading1">Contact Information</td></tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td width="40%" class="txtstyle">First Name</td>
			<td width="5%">:</td>
			<td width="55%"><input type="text" name="user_fname" value="<?=$prod1[1]?>" /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Last Name</td>
			<td>:</td>
			<td class="txtstyle"><input type="text" name="user_lname" value="<?=$prod1[2]?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle" valign="top">Email</td>
			<td valign="top">:</td>
			<td valign="top">
				<input type="text" name="user_email" value="<?=$prod1[3]?>" onBlur="updateName1(this.value);"  />
				<span id="checked1" class="errstyle"><?=$_GET['msg2']?></span>
			</td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Phone</td>
			<td>:</td>
			<td class="txtstyle"><input type="text" name="user_phone" value="<?=$prod1[4]?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Mobile</td>
			<td>:</td>
			<td class="txtstyle"><input type="text" name="user_mobile" value="<?=$prod1[5]?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr> <td colspan="3" class="heading1">Address Information</td></tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td width="40%" class="txtstyle">Country</td>
			<td width="5%">:</td>
			<td width="55%"><input type="text" name="user_country" value="<?=$prod1[6]?>" /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">State</td>
			<td>:</td>
			<td class="txtstyle"><input type="text" name="user_state" value="<?=$prod1[7]?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">City</td>
			<td>:</td>
			<td class="txtstyle"><input type="text" name="user_city" value="<?=$prod1[8]?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Address</td>
			<td>:</td>
			<td class="txtstyle"><input type="text" name="user_addr" value="<?=$prod1[9]?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="cat_submit" value="Submit" />
				 <input type="reset" name="btn" value="Reset" />			
			</td>
		</tr>
		<tr>
		  <td colspan="3" align="center">&nbsp;</td>
		  </tr>
		</table>
		</form>
		</td>
	</tr>
	<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>
