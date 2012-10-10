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
			<tr><td>Thanking you</td><td>&nbsp;<br>jobportal</td></tr></table>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.jobsinlive. "\r\n";
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
<table width="980" align="center" cellpadding="0" cellspacing="0" class="tabcolor">

<tr><td colspan="4"><?php include('header.php')?></td></tr>
<tr><td colspan="4" ><p>&nbsp;</p>
    
    <p>&nbsp;</p></td></tr>

  <tr>
    <td width="10">&nbsp;</td>
    <td valign="top" width="80%">
	<h4 align="center" style="color:#FF0000;"><?=$pmsg?><?=$msg?></h4>
	<form name="pgenerate" method="post">
	<table align="center" class="innertab" cellpadding="0" cellspacing="0">
	<tr>
  		<td colspan="4" class="headings" align="center" ><strong>Forget Password</strong></td>
  	</tr>
	<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
	<tr class="tabcolor">
		<td><span class="style4 trpad">Enter your Mail Id</span>:</td>
		<td><input type="text" size=18 name="output"></td>
		<td><input type="hidden" name="abc"></td>
		<td><input name="submit" type="submit" class="btn" onClick="populateform(this.form.thelength.value)" value="submit">
		<br />
			<input type="hidden" name="thelength" size=3 value="7"></td>
	</tr>
	<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
	</table>
	</form>
	</td>
	<td width="10">&nbsp;</td>
  </tr>
   <tr><td colspan="4" class="text"><p>&nbsp;</p><p>&nbsp;</p>
       <p>&nbsp;</p>
       <br /></td></tr>
  <tr><td colspan="4" ><?php include "footer.php"?></td></tr>
</table>


