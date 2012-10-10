<? 
include "../db/dbcon.php";
$aun=$_SESSION['aun'];
extract ($_POST);
//print_r($_POST);
//echo $un;
$select=mysql_query("SELECT *FROM `real-reg`WHERE `r_un` = '".$aun."'");
//echo $select;
$num=mysql_num_rows($select);
if($num=='')
{
	echo "invalid user name";
}
else
{?>
<script type="text/javascript">
function isNotEmpty(fname,txt)
{
		if(fname.value=="" || fname.value==null)
		{
		alert(txt);
		fname.focus();
		return true;
		}
		return false;
}
function pass(reg,txt)
{
 var pass1=reg.value;
 if(pass1.length >= 4 && pass1.length <= 20)
 {
 	return false;
 }
 else
 {
    alert(txt);
	reg.value="";
	reg.focus();
	return true;
 }
 }
 function samepass(reg,reg1)
{
	 //alert("aaaaaaaaaaaaaaaaaaaaaaa");
 	var pass=reg.value;
	//alert(pass);
	
	var repass=reg1.value;
	//alert(repass);
	if(pass==repass)
	{
		return false;
	}
	else
	{
		alert("passwords are not same enter same passwords in both fields");
		reg1.value="";
		reg1.focus();
		return true;
	}
 }
 function validateForm(reg) 
{
if(isNotEmpty(reg.pw,"password should not empty")){return false}
	
	if(pass(reg.pw)){return false}
	
	if(isNotEmpty(reg.rpw,"retype password should not empty")){return false}
	
	if(samepass(reg.pw,reg.rpw)){return false}
}
	
</script>
<style type="text/css">
.text1{font-size:12px;}
</style>
<body >
<?
if($_POST['submit1'])
{
	              
	$update=mysql_query("update `real-reg` set `r_pw`='".$pw."' where `r_un`='".$aun."'");
	$msg= "password successfully changed &nbsp;&nbsp;<a href='main.php?lk=myaccount>go to myaccount</a>";
}
?>

<form method="post" onSubmit="return validateForm(this);">
<table width="80%" align="center" class="text1" style="border:1px solid;">
<tr><td colspan="3"><? include "header.php";?></td></tr>
<tr><td class="3"><p>&nbsp;</p><p>&nbsp;</p></td></tr>

<tr><td colspan="3" align="center"><font size="3"><?=$msg?></font></td></tr>
<tr>
	<td colspan="3" align="center"><h3>Forget Password</h3></td>
</tr>
<tr><td><table width="50%" align="center">
<tr>
 <td >Your&nbsp;mail&nbsp;Id </td><td>:</td>
 <td><input name="un" type="text" readonly="" value="<?=$aun?>"/></td>
</tr>
<tr>
	<td>Enter new password</td><td>:</td>
	<td><input name="pw" type="password"/></td>
</tr>
<tr>
	<td>Confirm password</td><td>:</td>
	<td><input name="rpw" type="password" /></td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="submit" name="submit1" value="add" />&nbsp;
	<input type="button" name="btn" value="Cancel" onClick="javascript:window.location='main.php?lk=myaccount'"></td>
</tr>
</table></td></tr>
<tr><td class="3"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></td></tr>

</table>
</form>
<? }?>


</body>