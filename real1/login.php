<? session_start();
include "dbcon.php";
include "class/class.php";
extract ($_POST);
if($_POST['submit'])
{
	//print_r($_POST);
	$select=mysql_query("select * from `real-reg` where `r_un`='".$un."' and `r_pw`='".$pw."' and `r_status`='a'");
	$row=mysql_fetch_array($select);
	$num=mysql_num_rows($select);
	if($num=='')
	{
		$msg ="invalid User name or password";
	}
	elseif($row['r_status']=='n')
	{
		$msg="Your account notyet approved";
	}elseif($row['r_status']=='d')
	{
		$msg="your account bloked";
	}else{
		$_SESSION['un']=$un;
		$_SESSION['uid']=$row['r_id'];
		echo "<script>location.replace('myaccount.php?act=show')</script>";
	}
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
</head>

<style type="text/css">
.container{ width:50%; height:500px;}
</style>
<script type="text/javascript">
/*function isNotEmpty(fname,txt)
{
		if(fname.value=="" || fname.value==null)
		{
		alert(txt);
		fname.focus();
		return true;
		}
		return false;
}
function email(reg)
{
	var e=reg.value;
	var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
	if(e.match(e1))
	{
		return false;
	}
	else
	{
		alert("enter email id in correct way");
		reg.value="";
		reg.focus();
		return true;
	}
}
function validateForm(reg)
{
	
	if(isNotEmpty(reg.un,"Email address should not be Empty")){return false}
	
	if(email(reg.un,"Enter Email Id in correct Format should not be Empty")){return false}
	
	if(isNotEmpty(reg.pw,"Password should not be Empty")){return false}
}*/
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>
<table width="980" class="tabcolor" align="center" cellpadding="0" cellspacing="0">

	<tr><td colspan="3"><? include "header.php"?></td></tr>
	<tr><td colspan="3"><p>&nbsp;</p><p>&nbsp;</p></td></tr>
	<tr>
		<td width="15%">&nbsp;</td>
	<td align="center"><?=$msg?>
	<form method="post" onSubmit="return validateForm(this)">
	<table width="50%" cellpadding="0" cellspacing="0" class="innertab">
		<tr><td colspan="3" align="center" class="headings">Login</td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
		    <td class="trpad style4">User Name</td>
		    <td>:</td>
		    <td><input type="text" name="un" size="30" /></td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
		<tr class="tabcolor">
		    <td class="trpad style4">Password</td>
		    <td>:</td>
		    <td><input name="pw" type="password" size="30"></td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
		<tr class="tabcolor">
		    <td align="center" colspan="3"><input type="submit" name="submit" value="submit" /></td>
		</tr>
		<tr class="tabcolor">
		  	<td colspan="3" align="center">
				<span class="style4">Forget Password <a class="b" href="pass1.php">Click here</a></span>
				<br />
				
				<span class="style4">Dont u have Login ID <a class="b" href="reg.php">Register here</a></span>			</td>
		</tr>
	</table>
	</form>
	</td>
	<td width="15%">&nbsp;</td>
	</tr>
	<tr><td colspan="3"><p>&nbsp;</p><br /></td></tr>
	<tr><td colspan="3"><? include "footer.php"?></td></tr>
</table>
</body>
</html>