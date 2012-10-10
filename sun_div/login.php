<? session_start();
session_unset();
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
<div  align="center">
<div style="width:980px;" class="tabcolor">

	<div><? include "header.php"?></div>
	<div>&nbsp;</div><br />
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	
		
	<div align="center"><?=$msg?>
	<form method="post" onSubmit="return validateForm(this)">
	<div style="width:35%" >
<div align="center" class="innertab">

<div align="center" class="style3"><strong>Login</strong> </div>
		<div class="linebreak">&nbsp;</div>
		<div  style="height:20px"class="linebreak">&nbsp;</div>
		<div class="tabcolor">
		    <div  style="float:left; padding-left:15px">User Name</div>
		    <div  align="center">:
		      <input type="text" name="un" size="30" />
		    </div>
		</div>
		<div class="linebreak">&nbsp;</div>
		<div class="tabcolor">
		    <div style="float:left; padding-left:15px">Password&nbsp;&nbsp;</div>
		   <div align="center">:
		     <input name="pw" type="password" size="30" />
		   </div>
	    </div>
		<div class="linebreak">&nbsp;</div>
		<div class="tabcolor">
		    <div align="center"><input type="submit" name="submit" value="submit" /></div>
		</div>
		<div class="tabcolor">
		  	<div align="center">
				<span class="style4">Forget Password <a class="b" href="pass1.php">Click here</a></span></div>
		<div class="tabcolor"><span class="style4">Dont u have Login ID <a class="b" href="reg.php">Register here</a></span></div>			</div>
		</div>
	</div>
	</div>
	</form>
	

	<div style="width:15%">&nbsp;</div>

	<div style="height:77px">&nbsp;
     </div>
	<div><? include "footer.php"?></div>
</div>
</div>
</body>
</html>