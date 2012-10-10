<? session_start();
session_unset();
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
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="sitewidth">
<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
<tr><?
	extract($_POST);
	if($_POST['submit'])
	{
		$pass=mysql_query("select * from ".USERS." where user_email='".$_POST['output']."'");
		$fet=mysql_fetch_array($pass);
		$passnum=mysql_num_rows($pass);
		if($passnum=='')
		$pmsg = "Invalid Email Address";
		else
		{
			//$a=$_POST['abc'];
			$a=$fet['password'];
			//echo $a
			$to= $_POST['output'];
			$subject= "Your password for ".WEBSITE_NAME ;
			$body= "<table>
			<tr><td>Your new password for ".WEBSITE_NAME." Account is:&nbsp;&nbsp;</td><td>$a </td></tr>
			<tr><td>Thanking you</td><td>&nbsp;<br>".WEBSITE_NAME."</td></tr></table>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.WEBSITE_NAME. "\r\n";
			if(mail($to, $subject, $body ,$headers))
			{
				//$p=mysql_query("update `mat-reg` set reg_password='".$_POST['abc']."' where reg_mail='".$_POST['output']."'");
				$rmsg= "Your new password is sent to your mail";
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

    <td  class="page" align="center">
	<div class="errstyle"><?=$pmsg?><?=$rmsg?></div>
	<form name="pgenerate" method="post">
	<table align="center" class="menu_back_color1" cellpadding="0" cellspacing="0">
	<tr class="trheight">
  		<td colspan="4" class="heading1" align="center" ><strong>Forgot Password</strong></td>
  	</tr>
	<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td><span class="txtstyle trpad">Enter your Mail Id</span>:</td>
		<td><input type="text" size=18 name="output"></td>
		<td><input type="hidden" name="abc"></td>
		<td><input name="submit" type="submit"  onClick="populateform(this.form.thelength.value)" value="submit">
		<br />
			<input type="hidden" name="thelength" size=3 value="7"></td>
	</tr>
	<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
	</table>
	</form>
	</td>
	
  </tr>
  <tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>



