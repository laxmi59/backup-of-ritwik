<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
//include "ajax_site.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['user_id']==''){ echo "<script>location.replace('".FRONT_HOME."')</script>";}
require_once("includes/pagination.php");
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
$usr=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$_SESSION[user_id]'"));
$comp=mysql_fetch_array(mysql_query("select * from cal_company where id='$_SESSION[company_id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass">
</td></tr>
</table>
<script type="text/javascript" src="js/cal.js"></script>
<script type="text/javascript">
var xmlHttp
function GetSiteFromState(str,id){ 
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request")
 		return
 	}
	document.getElementById('checked').innerHTML = "Checking...";
	var field="get_site_state";
	var url="ajax_site.php"
	url=url+"?q="+str
	url=url+"&q1="+id
	url=url+"&act="+field
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChanged() { 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 		document.getElementById("checked").innerHTML=xmlHttp.responseText; 
	} 
}

function GetSlots(str){ 
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request")
 		return
 	}
	str1=document.getElementById('site').value;
	document.getElementById('checked1').innerHTML = "Checking...";
	var field="get_slots";
	var url="ajax_site.php"
	url=url+"?q="+str
	url=url+"&q1="+str1
	url=url+"&act="+field
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged1 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChanged1() { 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 		document.getElementById("checked1").innerHTML=xmlHttp.responseText; 
	} 
}



//main code starts//
function GetXmlHttpObject(){
	var xmlHttp=null;
	try {
		// Firefox, Opera 8.0+, Safari
 		xmlHttp=new XMLHttpRequest();
 	}catch (e) {
 		//Internet Explorer
 		try{
  			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  		} catch (e)  {
  			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
 	}
	return xmlHttp;
}
</script>
<link href="css/cal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function ff(table,col,val){
	window.location='extra/csv.php?act1=exp&tab='+table+'&col='+col+'&val='+val;
}
function vac(ser)
{
	window.location='reg.php?act=all_dates&ser_id='+ser;
}
</script>
<script type="text/javascript" src="js/reg.js"></script>
</head>
<body>
<table border="0"  class="page" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2"><? include 'header.php'?></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
	<td width="40%" valign="top" align="left"><? include "left.php";?></td>
	<td width="60%" height="380" valign="top">
	<table width="95%" border="0" align="center" cellpadding="5" cellspacing="5">
	<tr><td align="right">
	<div align="right"><input type="submit" value="Print" name="print" onclick="javascript:window.location='<?=CSV_DOWN?>?act=company_print&id=<?=$_SESSION['user_id']?>'" /></div>
	</td></tr>
	<tr><td align="center">
	<? if($_GET['act']=='sel'){?>
	<div align="center"><a href="reg.php?act=service" class="b">Add new appointment</a></div>
	<? }?>
	</td></tr></table>
	<? if($_GET['act']=='service'){?>
	<form method="post" name="booking" action="reg.php?act=final">
	<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
	<tr><td>Select State</td><td>
	<select name="state" style="width:200px;" onchange="GetSiteFromState(this.value,<?=$_SESSION['company_id']?>)">
		<option>select</option>
		<? 
		$slt=mysql_query("select * from cal_slots where sloot_time >now()");
		$sltno=mysql_num_rows($slt);
		if($sltno<>''){
			$state=mysql_query("select distinct a.name, a.id from cal_state a, cal_site b where a.id=b.state and b.company=$_SESSION[company_id]");
			while($state_fet=mysql_fetch_array($state)){?>
			<option value="<?=$state_fet['id']?>"><?=$state_fet['name']?></option>
			<? }?>
		<? }?>
	</select>
	</td></tr>
	<tr>
		<td>Select Site</td><td>
			<span id="checked">
			<select name="site" id="site" style="width:200px;" onchange="tt(this.value);">
			<option>select</option>
			</select>
			</span>
		</td>
	</tr>
	<tr><td>Select Service</td><td>
	<select name="service" style="width:200px;" onchange="GetSlots(this.value)">
		<option>select</option>
		<? $service=mysql_query("select distinct a.id, a.name from cal_services a, cal_slots b where a.id=b.service ");
		while($service_fet=mysql_fetch_array($service)){?>
		<option value="<?=$service_fet['id']?>"><?=$service_fet['name']?></option>
		<? }?>
	</select>	
	</td></tr>
	<tr><td>Select Appointment</td><td>
	Date, time, availability
	<span id="checked1">
	<select name="appointment" style="width:200px;">
		<option>select</option>
	</select></span></td></tr>
	<tr><td colspan="2"><input type="submit" value="go" name="sub" /></td></tr>
	</table>
	</form>
	<? }?>
<? if($_GET['act']=='final'){
		extract($_POST);
		
		$statefinal=mysql_fetch_array(mysql_query("select * from cal_state where id='$state'"));
		$sitefinal=mysql_fetch_array(mysql_query("select * from cal_site where id='$site'"));
		$companyfinal=mysql_fetch_array(mysql_query("select * from cal_company where id='$sitefinal[company]'"));
		$servicefinal=mysql_fetch_array(mysql_query("select * from cal_services where id='$service'"));
		$slotfinal=mysql_fetch_array(mysql_query("select * from cal_slots where id='$appointment'"));
		$usr=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$_SESSION[user_id]'"));
	?>
	
	<table width="80%" align="center" cellpadding="0" cellspacing="0" class="txtstyle1">
	<tr>
		<td><div align="center" class="errstyle">
	  	Your Booking details are shown bellow select Either Confirm or cancel the following Booking Details
		</div></td>
	</tr>
	</table>
	<div>&nbsp;</div>
	<form name="final_submit" method="post"  action="<?=USER_DATA?>?act=bookingfinal&type=yes">
	<input type="hidden" name="state" value="<?=$statefinal[id]?>" />
	<input type="hidden" name="site" value="<?=$sitefinal[id]?>" />
	<input type="hidden" name="service" value="<?=$servicefinal[id]?>" />
	<input type="hidden" name="appointment" value="<?=$slotfinal[id]?>" />
	<table width='90%' border='0' align='center' cellpadding='0' cellspacing='0' class='table_border'>
    <tr class="menu_back_color1">
        <td height="25" colspan='3' align="center" class="txtstyle1big"><b>Your Booking Info</b></td>
	</tr>
	<tr>
    	<td class="txtstyle trpad">Date</td>
        <td>:</td>
        <td class="txtstyle1"><?=date('d/m/y',strtotime($slotfinal['date']))?></td>
    </tr>
    <tr>
        <td class="txtstyle trpad">Time</td>
        <td>:</td>
        <td class="txtstyle1"><?=$slotfinal['start_time']." ".$slotfinal['merid']?></td>
    </tr>
    <tr>
        <td class="txtstyle trpad">First Name</td>
        <td>:</td>
        <td class="txtstyle1"><?=$usr['user_fname']?></td>
    </tr>
    <tr>
        <td class="txtstyle trpad">Last Name</td>
        <td>:</td>
        <td class="txtstyle1"><?=$usr['user_lname']?></td>
    </tr>
    <tr>
        <td class="txtstyle trpad">Email</td>
        <td>:</td>
        <td class="txtstyle1"><?=$usr['user_mail']?></td>
    </tr>
    <tr>
        <td class="txtstyle trpad">Phone</td>
        <td>:</td>
        <td class="txtstyle1"><?=$usr['user_phone']?></td>
    </tr>
    <tr>
        <td class="txtstyle trpad">Mobile</td>
        <td>:</td>
        <td class="txtstyle1"><?=$usr['user_mobile']?></td>
    </tr>
	<tr>
		<td colspan="3" align="center">
	    <input type="submit" name="btn" value="Confirm" /> &nbsp;
        <input type="button" name="btn1" value="Cancel" onclick="javascript:window.location='<?=USER_DATA?>?act=bookingfinal&type=no&ser_id=<?=$_GET['ser_id']?>'" />
	    </td>
	</tr>
    </table>
	</form>
	<?	}?>

	<? if($_GET['act']=='cancel'){?>
	<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td class="txtstylebig">Sorry. Your are Canceled the booking</td></tr>
	<tr><td><p>&nbsp;</p></td></tr>
	<tr>
		<td class="txtstylebig">To make another booking 	
			<a href="reg.php?act=service" class="menu4">click here</a>
		</td>
	</tr>
	</table>
	<? }?>
	<? if($_GET['act']=='thanku'){?>
	<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td class="txtstylebig">Congratulations. Your are Successfully Registerd for this Services</td></tr>
	<tr>
		<td><?
			$book_fet=mysql_fetch_array(mysql_query("select * from cal_booking where bid='$_GET[book_id]'"));
			$slot=mysql_fetch_array(mysql_query("select * from cal_slots where id='$book_fet[slot_id]'"));
			$cust_fet=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$book_fet[user_id]'"));
			?>	
		<p>&nbsp;</p>
		<table width='90%' border='0' align='center' cellpadding='0' cellspacing='0' class='table_border'>
		<tr class="menu_back_color1">
			<td height="24" colspan='2' align="center" class="txtstyle1big"><b>Your Booking Info</b></td>
			<td height="24" align="right">
				<a href="<?=USER_DATA?>?act=book_delete&bid=<?=$_GET['bid']?>" class="a"><img src="images/delete.png" title="Delete" alt="Delete" border="0" /></a>  <a href="<?=USER_DATA?>?act=book_mail&bid=<?=$_GET['book_id']?>" class="a"><img src="images/mail.jpg" height="20" width="20" border="0" alt="Email" title="Email" /></a> 
				<a href="includes/csv.php?act=book_print&bid=<?=$_GET['book_id']?>" class="a"><img border="0" src="images/download.png" height="20" width="20" title="Download Bookings" alt="Download Bookings" /></a>			</td>
		</tr>
		
		  <td class="txtstyle trpad">Date</td><td>:</td><td class="txtstyle1"><?=date('d/m/y',strtotime($slot['date']))?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Time</td><td>:</td><td class="txtstyle1"><?=$slot['start_time']." ".$slot['merid']?></td></tr>
		<tr>
		  <td class="txtstyle trpad">First Name</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_fname]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Last Name</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_lname]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Email</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_mail]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Phone</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_phone]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Mobile</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_mobile]?></td></tr>
	  </table>
	</td></tr>
	<tr><td class="txtstylebig">To make another booking <a href="reg.php?act=service" class="menu4">click here</a></td>
	</tr>
	</table>
	<? }?>
	<?
	if($_GET['bid']<>''){
		$book_fet=mysql_fetch_array(mysql_query("select * from ".BOOK." where bid='$_GET[bid]'"));
		$slot=mysql_fetch_array(mysql_query("select * from cal_slots where id='$book_fet[slot_id]'"));
		$cust_fet=mysql_fetch_array(mysql_query("select * from ".USERS." where user_id='$book_fet[user_id]'"));
	?>	
	<p>&nbsp;</p>
		<table width='70%' border='0' align='center' cellpadding='0' cellspacing='0' class='table_border'>
		<tr class="menu_back_color1">
			<td height="24" colspan='2' align="center" class="txtstyle1big"><b>Your Booking Info</b></td>
			<td height="24" align="right">
				<a href="<?=USER_DATA?>?act=book_delete&bid=<?=$_GET['bid']?>" class="a"><img src="images/delete.png" title="Delete" alt="Delete" border="0" /></a>
				<a href="<?=USER_DATA?>?act=book_mail&bid=<?=$_GET['bid']?>" class="a"><img src="images/mail.jpg" height="20" width="20" border="0" alt="Email" title="Email" /></a>
				<a href="includes/csv.php?act=book_print&bid=<?=$_GET['bid']?>" class="a"><img border="0" src="images/download.png" height="20" width="20" title="Download Bookings" alt="Download Bookings" /></a>			</td>
		</tr>
		
		<tr>
		  <td class="txtstyle trpad">Date</td><td>:</td><td class="txtstyle1"><?=date('d/m/y',strtotime($slot['date']))?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Time</td><td>:</td><td class="txtstyle1"><?=$slot[start_time]." ".$slot[merid]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">First Name</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_fname]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Last Name</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_lname]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Email</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_mail]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Phone</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_phone]?></td></tr>
		<tr>
		  <td class="txtstyle trpad">Mobile</td><td>:</td><td class="txtstyle1"><?=$cust_fet[user_mobile]?></td></tr>
	  </table>
<?	}?></td>
  </tr>
	<tr><td class="linebreak"></td></tr>
	</table>
	</td>
</tr>
<tr><td colspan="2"><? include "footer.php";?></td></tr>
</table>
</body>
</html>