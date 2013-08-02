<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "config.php";
include "filenames.php";
include "functions.php";
include "classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<?
////////////////////////				Login ////////////////////////////////////////////
if($_GET['act']=='login'){
	extract($_POST); // You should really sanitize this.
	//print_r($_POST);
	$qur=mysql_query("select * from ".ADM." where `username`='".mysql_real_escape_string($username)."' and `password`='".mysql_real_escape_string($password)."'");
	//echo "select * from".ADM." where `username`='$username' and `password`='$password'";
	$qnum=mysql_num_rows($qur);
	$qfet=mysql_fetch_array($qur);
	if($qnum==''){
		echo "<script>location.replace('../admin/index.php?err=Invalid Username or Password')</script>";
	}else{
		$_SESSION['admin_id']=$qfet['id'];
		$_SESSION['admin_name']=$qfet['username'];
		/*echo "<script>location.replace('../admin/".ADM_HOME."')</script>";*/
		echo "<script>location.replace('../admin/timeslots.php?act=show')</script>";
	}
}
?>
<?
//////////////////////////////////////////         services                     //////////////////////////////////
if($_GET['act']=='add_new_service'){
	extract($_POST); // You should really sanitize this.
	//print_r($_POST);
	if($_GET['ser_id']){
		$iid=$_GET['ser_id'];
		if($_FILES['consumer_info']['name']){
		    $img1=$_FILES['consumer_info']['name'];
			$ex1=strrchr($img1,".");
			$filename_consumer="consumer".$iid.$ex1;
			move_uploaded_file($_FILES["consumer_info"]["tmp_name"],"../admin/uploads/" . $filename_consumer);
		}
		if($_FILES['facts_info']['name']){
			$img2=$_FILES['facts_info']['name'];
			$ex2=strrchr($img2,".");
			$filename_facts="facts".$iid.$ex2;
			move_uploaded_file($_FILES["facts_info"]["tmp_name"],"../admin/uploads/" . $filename_facts);
		}
		if($_FILES['consent_info']['name']){
			$img3=$_FILES['consent_info']['name'];
			$ex3=strrchr($img3,".");
			$filename_consent="consent".$iid.$ex3;
			move_uploaded_file($_FILES["consent_info"]["tmp_name"],"../admin/uploads/" . $filename_consent);
		}
		if($_FILES['additional_info']['name']){
			$img4=$_FILES['additional_info']['name'];
			$ex4=strrchr($img4,".");
			$filename_additional="additional".$iid.$ex4;
			move_uploaded_file($_FILES["additional_info"]["tmp_name"],"../admin/uploads/" . $filename_additional);
		}
		$upd=mysql_query("update cal_services set name='".mysql_real_escape_string($service)."', `consumer_info`='".mysql_real_escape_string($filename_consumer)."', `facts_info`='".mysql_real_escape_string($filename_facts)."', `consent_info`='".mysql_real_escape_string($filename_consent)."', `additional_info`='".mysql_real_escape_string($filename_additional)."' where id='".mysql_real_escape_string($iid)."'");
	}else{
		$ins=mysql_query("insert into cal_services (`name`,`date`) values('".mysql_real_escape_string($service)."',now())");
		$iid=mysql_insert_id();
		if($_FILES['consumer_info']['name']){
		    $img1=$_FILES['consumer_info']['name'];
			$ex=strrchr($img1,".");
			$filename_consumer="consumer".$iid.$ex;
			move_uploaded_file($_FILES["consumer_info"]["tmp_name"],"../admin/uploads/" . $filename_consumer);
		}
		if($_FILES['facts_info']['name']){
			$img2=$_FILES['facts_info']['name'];
			$ex1=strrchr($img2,".");
			$filename_facts="facts".$iid.$ex1;
			move_uploaded_file($_FILES["consumer_info"]["tmp_name"],"../admin/uploads/" . $filename_facts);
		}
		if($_FILES['consent_info']['name']){
			$img3=$_FILES['consent_info']['name'];
			$ex3=strrchr($img3,".");
			$filename_consent="consent".$iid.$ex3;
			move_uploaded_file($_FILES["consent_info"]["tmp_name"],"../admin/uploads/" . $filename_consent);
		}
		if($_FILES['additional_info']['name']){
			$img4=$_FILES['additional_info']['name'];
			$ex4=strrchr($img4,".");
			$filename_additional="additional".$iid.$ex4;
			move_uploaded_file($_FILES["additional_info"]["tmp_name"],"../admin/uploads/" . $filename_additional);
		}
		$upd=mysql_query("update cal_services set `consumer_info`='".mysql_real_escape_string($filename_consumer)."', `facts_info`='".mysql_real_escape_string($filename_facts)."', `consent_info`='".mysql_real_escape_string($filename_consent)."', `additional_info`='".mysql_real_escape_string($filename_additional)."' where id='".mysql_real_escape_string($iid)."'");
	}
	echo "<script>location.replace('../admin/service.php?act=show')</script>";
}

if($_GET['act']=='service_delete'){
	$del=mysql_query("delete from `cal_slots` where service='".mysql_real_escape_string($_GET[id])."'");
	$del1=mysql_query("delete from `cal_services` where id='".mysql_real_escape_string($_GET[id])."'");
	
	echo "<script>location.replace('../admin/service.php?act=show&id=$_GET[cid]')</script>";
}


?>
<?
/////////////////////////////////////////////                  state      /////////////////////////////////////////
if($_GET['act']=='add_new_state'){
	extract($_POST);
	$ins=mysql_query("insert into cal_state (`name`,`date`) values('".mysql_real_escape_string($state)."',now())");
	echo "<script>location.replace('../admin/state.php?act=show')</script>";
}

if($_GET['act']=='state_delete'){
	$del=mysql_fetch_array(mysql_query("select * from cal_state where id='".mysql_real_escape_string($_GET[id])."'"));
	$del1=mysql_query("delete from cal_site where state='".mysql_real_escape_string($del[id])."'");
	//echo "delete from cal_site where state=$del[id]";
	//exit;
	mysql_query("delete from cal_state where id='".mysql_real_escape_string($_GET[id])."'");
	echo "<script>location.replace('../admin/state.php?act=show')</script>";
}
?>
<?
/////////////////////////////////////////////                   sites     /////////////////////////////////////////
if($_GET['act']=='add_new_site'){
	extract($_POST);
	$ins=mysql_query("insert into cal_site (`state`,`company`,`name`,`date`) values('".mysql_real_escape_string($state)."','".mysql_real_escape_string($company)."','".mysql_real_escape_string($name)."',now())");
	echo "<script>location.replace('../admin/sites.php?act=show')</script>";
}

if($_GET['act']=='site_delete'){
	$sltdel=mysql_query("delete from cal_slots where site='".mysql_real_escape_string($_GET[id])."'");
	$del=mysql_query("delete from cal_site where id='".mysql_real_escape_string($_GET[id])."'");
	echo "<script>location.replace('../admin/sites.php?act=show')</script>";
}
?>
<?
/////////////////////////////////////                    company              ///////////////////////////////////
if($_GET['act']=='add_new_com'){
	extract($_POST);
	if($_GET['id']==''){
	$ins=mysql_query("insert into `cal_company` (`companyname`,`password`,`company_mail`,`business_type`,`date`) values('".mysql_real_escape_string($username)."','".mysql_real_escape_string($password)."','".mysql_real_escape_string($user_mail)."','".mysql_real_escape_string($type)."',now())");
	$to= $user_mail;
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
	}else{
		$ins=mysql_query("update `cal_company` set `companyname`='".mysql_real_escape_string($username)."', `password`='".mysql_real_escape_string($password)."', `company_mail`='".mysql_real_escape_string($user_mail)."', `business_type`='".mysql_real_escape_string($type)."' where id='".mysql_real_escape_string($_GET[id])."'");
	}
	echo "<script>location.replace('../admin/company.php?act=show')</script>";
}

if($_GET['act']=='com_delete'){
	$del1=mysql_query("delete from cal_site where company='".mysql_real_escape_string($_GET[id])."'");
	$sltdel=mysql_query("delete from cal_slots where company='".mysql_real_escape_string($_GET[id])."'");
	$del=mysql_query("delete from cal_company where id='".mysql_real_escape_string($_GET[id])."'");
	echo "<script>location.replace('../admin/company.php?act=show')</script>";
}
////////////////////////////////           new slot/////////////////////////////////////////////////////////////
if($_GET['act']=='add_new_slot'){
extract($_POST);
	$start_time=$sh.":".$sm." ".$meridum;
	$slot_time=$date1." ".$sh.":".$sm.":00";
	if($_GET['id']){
		$ins=mysql_query("UPDATE `cal_slots` SET `company` = '".mysql_real_escape_string($company)."',`site` = '".mysql_real_escape_string($site)."',`address` = '".mysql_real_escape_string($address)."',`service` = '".mysql_real_escape_string($service)."',`available` = '".mysql_real_escape_string($available)."',`trading` = '".mysql_real_escape_string($trading)."',`start_time` = '".mysql_real_escape_string($start_time)."', `date`='".mysql_real_escape_string($date1)."',`persons`='".mysql_real_escape_string($available)."', `merid`='".mysql_real_escape_string($merid)."', `date1`=now(), `place`='".mysql_real_escape_string($place)."', `sloot_time`= '".mysql_real_escape_string($slot_time)."'  WHERE `id`='".mysql_real_escape_string($_GET[id])."'");
		
	}else{
		$ins=mysql_query("INSERT INTO `cal_slots` (`company` ,`site` ,`address` ,`service` ,`available` ,`trading` ,`start_time` ,`date` ,`persons`, `merid`,`date1`,`place`,`sloot_time`) VALUES ('".mysql_real_escape_string($company)."', '".mysql_real_escape_string($site)."', '".mysql_real_escape_string($address)."', '".mysql_real_escape_string($service)."', '".mysql_real_escape_string($available)."', '".mysql_real_escape_string($trading)."', '".mysql_real_escape_string($start_time)."', '".mysql_real_escape_string($date1)."', '".mysql_real_escape_string($available)."', '".mysql_real_escape_string($merid)."',now(),'".mysql_real_escape_string($place)."','".mysql_real_escape_string($slot_time)."')");
		
	}
	echo "<script>location.replace('../admin/timeslots.php?act=show&msg=successfully added')</script>";
}
if($_GET['act']=='slot_delete'){
	$del=mysql_query("delete from `cal_slots` where id='".mysql_real_escape_string($_GET[id])."'");
	echo "<script>location.replace('../admin/timeslots.php?act=show')</script>";
}
?>
