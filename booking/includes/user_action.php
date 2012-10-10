<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "config.php";
include "filenames.php";
include "functions.php";
include "classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<?
////////////////////////				Company Login ////////////////////////////////////////////
if($_GET['act']=='login'){
	extract($_POST);
	//print_r($_POST);
	$qur=mysql_query("select * from cal_company where `companyname`='$username' and `password`='$password'");
	$qnum=mysql_num_rows($qur);
	$qfet=mysql_fetch_array($qur);
	if($qnum==''){
		echo "<script>location.replace('../login.php?err=Invalid Username or Password')</script>";
	}else{
		$_SESSION['company_id']=$qfet['id'];
		//$_SESSION['username']=$qfet['username'];
		echo "<script>location.replace('../myaccount.php')</script>";
	}
}
////////////////////////				User Login ////////////////////////////////////////////
if($_GET['act']=='user_login'){
	extract($_POST);
	//print_r($_POST);
	$qur=mysql_query("select * from cal_users where `username`='$username' and `password`='$password'");
    //echo "select * from cal_users where `username`='$username' and `password`='$password'";
	$qnum=mysql_num_rows($qur);
	$qfet=mysql_fetch_array($qur);
	if($qnum==''){
		echo "<script>location.replace('../userlogin.php?err=Invalid Username or Password')</script>";
	}else{
		$_SESSION['user_id']=$qfet['user_id'];
		//$_SESSION['username']=$qfet['username'];
		echo "<script>location.replace('../reg.php?act=sel')</script>";
	}
}
?>
<?
//////////////////////////////////////				User Registration		///////////////////////////////
if($_GET['act']=='user_reg'){
	extract($_POST);
	$ins=mysql_query("INSERT INTO `cal_users` ( `company_id` , `username` , `user_fname` , `user_lname` , `user_mail` , `password` , `user_phone` , `user_mobile` , `date` , `bsb` , `business_unit` , `emp_id`,`division` )
VALUES ( '$_SESSION[company_id]', '$username', '$fname', '$lname', '$user_email', '$password', '$phone', '$mobile', now(), '$bsb', '$business_unit', '$emp_id','$division')");
	$to= $user_email;
	$subject= "Your registration information from ".WEBSITE_NAME;
	$body= "<table>
		<tr><td colspan='3'>You are successfully registered in our ".WEBSITE_NAME." Program</td></tr>
		<tr><td colspan='3'>Your Login information is</td></tr>
		<tr><td>Username</td><td>:</td><td>$username</td></tr>
		<tr><td>Password</td><td>:</td><td>$password</td></tr>
		<tr><td colspan='2'>Thanking You</td></tr>
		</table> ";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.WEBSITE_NAME. "\r\n";
	if(mail($to, $subject, $body ,$headers)){}
	echo "<script>location.replace('../userregistration.php?msg=successfully registered. check your mail for confirmation')</script>";
}
?>


<?
//////////////////////////////////////				User Booking2		///////////////////////////////
if($_GET['act']=='booking'){
	extract($_POST);
	$tt=$_SESSION['user_id'].",".$_GET['slot'].",".$_GET['ser_id'];
	echo "<script>location.replace('../reg.php?act=confirm&ser_id=$_GET[ser_id]&tt=$tt')</script>";
}
if($_GET['act']=='bookingfinal'){
extract($_POST);
	if($_GET['type']=='yes')
	{
		$statefinal=mysql_fetch_array(mysql_query("select * from cal_state where id='$state'"));
		$sitefinal=mysql_fetch_array(mysql_query("select * from cal_site where id='$site'"));
		$companyfinal=mysql_fetch_array(mysql_query("select * from cal_company where id='$sitefinal[company]'"));
		$servicefinal=mysql_fetch_array(mysql_query("select * from cal_services where id='$service'"));
		$slotfinal=mysql_fetch_array(mysql_query("select * from cal_slots where id='$appointment'"));
		$usr=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$_SESSION[user_id]'"));
		
		$ins=mysql_query("insert into cal_booking (`user_id`,`slot_id`,`ser_id`,`sloot_time`) values ('$_SESSION[user_id]','$appointment','$service' ,'$slotfinal[sloot_time]')");
		$iid=mysql_insert_id();
		
		$reduce=$slotfinal['available']-1;
		//echo $reduce;
		//exit;
		$upd=mysql_query("update cal_slots set `available`=$reduce where id='$slotfinal[id]'");
		$dt=date('d/m/y',strtotime($slotfinal['date']));
		$to= $usr['user_mail'];
		$to1= ADMIN_EMAIL;
		$subject= "Confirmation mail from ".WEBSITE_NAME;
		$subject1= "New User booking in ".WEBSITE_NAME;
		$body= "<table>
		<tr><td colspan='3'>Thank You for Booking an Appointment in our ".WEBSITE_NAME." Program</td></tr>
		<tr><td colspan='3'>Your Appointment information is</td></tr>
		<tr><td>Service</td><td>:</td><td>$servicefinal[name]</td></tr>
		<tr><td>Venue</td><td>:</td><td>$servicefinal[place]</td></tr>
		<tr><td>Appointment Date</td><td>:</td><td>$dt</td></tr>
		<tr><td>Time</td><td>:</td><td>$slotfinal[start_time]. $ts2[merid]</td></tr>
		<tr><td colspan='3'>If you can’t make an appointment or need to re-book, please delete your booking and make a new one to allow someone else to utilize that booking spot.  If you are running late to your appointment or need to attend earlier due to a meeting, please see the nurse to see when she can accommodate you at another time. 
 <br>Please ensure that you download all the information provided for your service under your booking and please bring the consent form on the day signed with any questions ready for the nurse.<br> 
Please ensure that you arrive to your appointment 10 minutes earlier.
</td></tr>
		</table> ";
		$body1= "<table>
		<tr><td colspan='3'>New User Booking an Appointment in our ".WEBSITE_NAME." Program</td></tr>
		<tr><td colspan='3'>Booking information is</td></tr>
		<tr><td>Name</td><td>:</td><td>$usr[user_fname]</td></tr>
		<tr><td>Name</td><td>:</td><td>$usr[user_lname]</td></tr>
		<tr><td>Email</td><td>:</td><td>$usr[user_mail]</td></tr>
		<tr><td>Phone</td><td>:</td><td>$usr[user_phone]</td></tr>
		<tr><td>Mobile</td><td>:</td><td>$usr[user_mobile]</td></tr>";
		
		if($usr[bsb]<>'')
			$body1 .="<tr><td>BSB/CC</td><td>:</td><td>$usr[bsb]</td></tr>";
		if($usr[business_unit]<>'')
			$body1 .="<tr><td>Business Unit</td><td>:</td><td>$usr[business_unit]</td></tr>";
		if($usr[emp_id]<>'')
			$body1 .="<tr><td>Employee ID</td><td>:</td><td>$usr[emp_id]</td></tr>";
		if($usr[division]<>'')
			$body1 .="<tr><td>Division</td><td>:</td><td>$usr[division]</td></tr>";
		
		$body1 .="<tr><td colspan='3'>Appointment information is</td></tr>
		<tr><td>Service</td><td>:</td><td>$servicefinal[name]</td></tr>
		<tr><td>Venue</td><td>:</td><td>$servicefinal[place]</td></tr>
		<tr><td>Appointment Date</td><td>:</td><td>$dt</td></tr>
		<tr><td>Time</td><td>:</td><td>$slotfinal[start_time]. $ts2[slot_meridium]</td></tr>
		</table> ";
		//echo $body;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.WEBSITE_NAME. "\r\n";
		if(mail($to, $subject, $body ,$headers)&& mail($to1, $subject1, $body1 ,$headers)){}
		
		echo "<script>location.replace('../reg.php?act=thanku&book_id=$iid')</script>";
	}elseif($_GET['type']=='no')
	{
		echo "<script>location.replace('../reg.php?act=cancel&ser_id=$_GET[ser_id]')</script>";
	}
}
if($_GET['act']=='book_delete'){
	$ts1=mysql_fetch_array(mysql_query("select * from cal_booking where bid='$_GET[bid]'"));
	$ts2=mysql_fetch_array(mysql_query("select * from cal_slots where id='$ts1[slot_id]'"));
	$reduce=$ts2[available]+1;
	$upd=mysql_query("update cal_slots set `available`=$reduce where id='$ts1[slot_id]'");
	$del=mysql_query("delete from cal_booking where bid=$_GET[bid]");
	echo "<script>location.replace('../reg.php?act=sel')</script>";
}

if($_GET['act']=='book_mail'){

	$book_fet=mysql_fetch_array(mysql_query("select * from cal_booking where bid='$_GET[bid]'"));
	$servicefinal=mysql_fetch_array(mysql_query("select * from cal_services where id='$book_fet[ser_id]'"));
	$slot=mysql_fetch_array(mysql_query("select * from cal_slots where id='$book_fet[slot_id]'"));
	$cust_fet=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$book_fet[user_id]'"));
	$dt=date('d/m/y',strtotime($slot['date']));
	$to= $cust_fet['user_mail'];
	$subject= "Booking details";
	$body .= "<table>
	<tr><td>&nbsp;</td></tr>
	<tr><td><b>Your Booking Info</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Service</td><td>:</td><td>$servicefinal[name]</td></tr>
	<tr><td>Venue</td><td>:</td><td>$slot[place]</td></tr>
	<tr><td>Date</td><td>:</td><td>$dt</td></tr>
	<tr><td>Time</td><td>:</td><td>$slot[start_time] &nbsp; $slot[merid]</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>First Name</td><td>:</td><td>$cust_fet[user_fname]</td></tr>
	<tr><td>Last Name</td><td>:</td><td>$cust_fet[user_lname]</td></tr>
	<tr><td>Email</td><td>:</td><td>$cust_fet[user_mail]</td></tr>
	<tr><td>Phone</td><td>:</td><td>$cust_fet[user_phone]</td></tr>
	<tr><td>Mobile</td><td>:</td><td>$cust_fet[user_mobile]</td></tr>";
	
	if($cust_fet[bsb]<>'')
		$body .="<tr><td>BSB/CC</td><td>:</td><td>$cust_fet[bsb]</td></tr>";
	if($cust_fet[business_unit]<>'')
		$body .="<tr><td>Business Unit</td><td>:</td><td>$cust_fet[business_unit]</td></tr>";
	if($cust_fet[emp_id]<>'')
		$body .="<tr><td>Employee ID</td><td>:</td><td>$cust_fet[emp_id]</td></tr>";
	if($cust_fet[division]<>'')
		$body .="<tr><td>Division</td><td>:</td><td>$cust_fet[division]</td></tr>";
			
	$body .="</table>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.ADMIN_EMAIL. "\r\n";
	if(mail($to, $subject, $body ,$headers)){}
	echo "<script>location.replace('../reg.php?act=sel')</script>";
}

?>

