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
	if($_POST['name']=='' || $_POST['email'] || $_POST['phone'] )
	{
		$msg1="You must Enter your Name ";
		$msg2="You must Enter your Email";
		$msg3="You must Enter your Phone";
		
	}else{
	//print_r($_POST);
		$reg1=$reg->reg11($_POST['un']);
		//echo $reg1['r_email'];
		$name=$_POST['name']; $email=$_POST['email']; $phone=$_POST['phone']; $desc=$_POST['desc'];
		$owner = $reg1['r_email'];
		$to="info@sunproperties.co.in";
		$subject = "mail to ".$owner;
		$body = "<table>
		<tr><td>name</td><td>:</td><td>$name</td></tr>
		<tr><td>email</td><td>:</td><td>$email</td></tr>
		<tr><td>phone</td><td>:</td><td>$phone</td></tr>
		<tr><td>desc</td><td>:</td><td>$desc</td></tr>
		</table>";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.sunproperties. "\r\n";
		if(mail($to,$subject,$body,$headers)){}
		/*echo "<script>location.replace('".$_GET['loc']."')</script>";*/
		echo "<script>window.close()</script>";
	}
}
 
?>
<link type="text/css" rel="stylesheet" href="css/style.css">
<form method="post">
<div style="width:100%">
	
	<div  class="innertab" ><span class="style3">Compose Mail</span></div>
	<div  class="tabcolor"><br />
	<div style="float:left" class="style4">Enter Your Name</div>
	<div align="center">:&nbsp;&nbsp;<input name="name" type="text"/><span class="style6"><?=$msg1?></span></div>
	</div>
	
	<div class="tabcolor">
	<div class="linebreak">&nbsp;</div>
	<div  style="float:left" class="style4">Enter Your Email </div>
	<div align="center">:&nbsp;&nbsp;<input name="email" type="text" /><span class="style6"><?=$msg2?></span></div>
	</div>
	
	
	<div class="tabcolor">
	<div class="linebreak">&nbsp;</div>
	<div style="float:left" class="style4">Enter Your Phone Number</div>
	<div style=" padding-left:43.5%">:&nbsp;&nbsp;<input name="phone" type="text" /><span class="style6"><?=$msg3?></span></div>
	</div>
	
	<div class="linebreak">&nbsp;</div>
	<div class="linebreak">&nbsp;</div>
	<div class="tabcolor">
		<div class="trpad style8" colspan="3">
			<textarea name="desc" readonly="readonly" rows="2" cols="40">I am interested in your property, Please contact me on the above mentioned contact details.</textarea>
		</div>
	
	
	<div class="tabcolor">
	<div class="linebreak">&nbsp;</div>
		<div align="center"><input type="submit" name="submit" value="send" /></div>
	</div>
	<div class="tabcolor"><p>&nbsp;</p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p></div></div>
</div>
</form>