<? session_start();
include "class/class.php";
include "dbcon.php";
$list= new real_list();
$b= new real_req();
$c= new real_location();
$reg= new real_reg();
$req=new req();
$prop=new real_property();
if($_GET['id']){
	$xx1=$list->refid($_GET['id']);
	$i=1;
}else if($_GET['aid']){
	$xx1=$list->areaid($_GET['aid']);
	$i=1;
}
$xx=mysql_fetch_array($xx1);
if($_POST['submit'])
{
	extract($_POST);
	//print_r($_POST);
	$reg1=$reg->reg11($_POST['un']);
	//echo $reg1['r_email'];
	$name=$_POST['name']; $email=$_POST['email']; $phone=$_POST['phone']; $desc=$_POST['desc'];
	$owner = $reg1['r_email'];
	$to="rama.3one@gmail.com";
	$subject = "mail to ".$owner;
	$body = "<table>
	
<tr><td>name</td><td>:</td><td>$name</td></tr>
<tr><td>email</td><td>:</td><td>$email</td></tr>
<tr><td>phone</td><td>:</td><td>$phone</td></tr>
<tr><td>desc</td><td>:</td><td>$desc</td></tr>
</table>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.job-portal. "\r\n";
	if(mail($to,$subject,$body,$headers))
	{
		$msg="this review sennt to your mail id";
	}
	else
	{
		$msg= "msg not sent";
	} 
	/*echo "<script>location.replace('".$_GET['loc']."')</script>";*/
	echo "<script>window.close()</script>";
}
 
?>
<link type="text/css" rel="stylesheet" href="css/style.css">
<form method="post">
<table width="100%" align="center" class="innertab" cellpadding="0" cellspacing="0">
	<tr><td colspan="3" class="style3">Compose Mail</td></tr>
	<tr class="tabcolor"><td colspan="3"><p>&nbsp;</p></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Enter Your Name </td>
		<td>: </td>
		<td><input name="name" type="text"/></td>
	</tr>
	<tr><td colspan="3" class="linebreak"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Enter Your Email </td>
		<td>: </td>
		<td><input name="email" type="text" /></td>
	</tr>
	<tr><td colspan="3" class="linebreak"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Enter Your Phone Number</td>
		<td>: </td>
		<td> <input name="phone" type="text" /></td>
	</tr>
	<tr><td colspan="3" class="linebreak"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8" colspan="3">
			<textarea name="desc" readonly="readonly" rows="2" cols="40">I am interested in your property, Please contact me on the above mentioned contact details.</textarea>
		</td>
	</tr>
	<tr><td colspan="3" class="linebreak"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" align="center"><input type="submit" name="submit" value="send" /></td>
	</tr>
	<tr><td colspan="3" class="linebreak"></td></tr>
	<tr><td colspan="3" class="tabcolor"><p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p></td></tr>
</table>
</form>