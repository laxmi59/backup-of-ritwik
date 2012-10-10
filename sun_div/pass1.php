<? 
include "dbcon.php";
	extract($_POST);
	if($_POST['submit'])
	{
		$pass=mysql_query("select * from `real-reg` where r_email='".$_POST['output']."'");
		$fet=mysql_fetch_array($pass);
		$passnum=mysql_num_rows($pass);
		if($passnum=='')
		$pmsg = "Invalid Email Address";
		else
		{
			$a=$_POST['abc'];
			//echo $a
			$to= $_POST['output'];
			$subject= "Your new password for Sun Properties Account";
			$body= "<table>
			<tr><td>Your new password for Sun Properties Account is:&nbsp;&nbsp;</td><td>$a </td></tr>
			<tr><td>Thanking you</td><td>&nbsp;<br>Sun Properties</td></tr></table>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.Sunproperties. "\r\n";
			if(mail($to, $subject, $body ,$headers))
			{
				$p=mysql_query("update `real-reg` set r_pw='".$_POST['abc']."' where r_email='".$_POST['output']."'");
				$msg= "Your new password is sent to your mail";
			}
			else
			{
				echo "msg not sent";
			}
			//echo $msg;
			//echo $emp_home;
		}
	}	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
</head>
<script>
var keylist="abcdefghijklmnopqrstuvwxyz123456789"
var temp=''

function generatepass(plength){
temp=''
for (i=0;i<plength;i++)
temp+=keylist.charAt(Math.floor(Math.random()*keylist.length));
return temp;
}
function populateform(enterlength){
document.pgenerate.abc.value=generatepass(enterlength)
}

</script>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<div align="center">
<body style="background-color:#CCCCCC;">
<div style="background-color:#FFFFFF; width:980px; height:365px">
<div style="height:15px"><?php include('header.php')?></div>
<div style="height:60px">&nbsp;</div>
<div style="height:135px; width:100%">
<div style="float:left; width:10%; height:135px">&nbsp;</div>
<div style="width:80%; height:135px; float:left">
<div style="height:30%" align="center" ><?=$pmsg?><?=$msg?></div>
<div style="height:70%; clear:both">
<form name="pgenerate" method="post">
<div style="margin-left:200px; margin-right:200px; height:95px">

<div class="innertab">

<div style="height:20%; background-color:#9CBEEE; font-weight:bold; font-size:15px; font-family:Verdana, Arial, Helvetica, sans-serif" align="center">Forget Password</div>


<div class="tabcolor">
<div style="height:20%">&nbsp;</div>
<div style="height:40%">

<div style="float:left; width:35%"><span style="font-family:Arial, Helvetica, sans-serif; font-size:11px;">Enter your Mail Id</span></div>
<div style="float:left; width:35%"><input type="text" size=18 name="output"></div>
<div style="float:left; width:5%"><input type="hidden" name="abc"></div>
<div style="clear:right; height:38px">
<input name="submit" type="submit" class="btn" onClick="populateform(this.form.thelength.value)" value="submit">
		<br />
			<input type="hidden" name="thelength" size=3 value="7"></div>
</div></div>			
			
			
			
</div>
<!--<div style="height:20%"></div>-->
</div>
</form>
</div>
</div>
<div style="height:135px; clear:right">&nbsp;</div>


</div>
<div style="height:135px">&nbsp;</div>
<div style="height:15px"><?php include "footer.php"?></div>
</div>
</body>
</body>