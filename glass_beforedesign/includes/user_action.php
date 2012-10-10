<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "config.php";
include "filenames.php";
include "functions.php";
include "classobjects.php";

////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['user_id']<>''){
	$reg1=mysql_fetch_array(mysql_query("select * from ".USERS." where user_id='$_SESSION[user_id]'"));
}
?>

<?
////////////////		Login ////////////////////////////////////////////
if($_GET['act']=='login'){
	extract($_POST);
	//print_r($_POST);
	$qur=mysql_query("select * from ".USERS." where `username`='$username' and `password`='$password' and `user_status`='a'");
	//echo "select * from".ADM." where `username`='$username' and `password`='$password'";
	$qnum=mysql_num_rows($qur);
	$qfet=mysql_fetch_array($qur);
	if($qnum==''){
		if($_GET['page']==''){
			echo "<script>location.replace('../".FRONT_LOG."?err=Invalid Username or Password')</script>";
		}else{
			echo "<script>location.replace('../$_GET[page]?err1=Invalid Username or Password')</script>";
		}
	}else{
		$_SESSION['user_id']=$qfet['user_id'];
		$_SESSION['username']=$qfet['user_fname'];
		if($_GET['pid']==''){
			echo "<script>location.replace('../".FRONT_PROFILE."?act=show')</script>";
		}else{
			$sel=mysql_fetch_array(mysql_query("select * from ".PRODUCT." where pid='$_GET[pid]'"));
			if($qfet['user_type']=='seller'){					
				$res= $application->discount($sel['prod_price'],$qfet['user_discount']);
				$price= $res;
				//echo $price;
			}else{
				$price= $sel['prod_price'];
			;
			}
			$ins=mysql_query("insert into ".CART." (`user_id`,`prod_id`,`price`,`quantity`) values ('$_SESSION[user_id]', '$_GET[pid]', '$price', '1')");
			//echo "insert into ".CART." (`user_id`,`prod_id`,`price`,`quantity`) values ('$_SESSION[user_id]', '$_GET[pid]', '$price', '1')";
			echo "<script>location.replace('../".FRONT_CART."')</script>";
		}
	}
}

////////////////		USERS	/////////////////////////////////////////////////
if($_GET['act']=='new_user'){
	extract($_POST);
	$u1=mysql_num_rows(mysql_query("select * from ".USERS." where `username`='$username'"));
	$u2=mysql_num_rows(mysql_query("select * from ".USERS." where `user_email`='$user_email'"));
	if($u1=='' && $u2==''){
		$ins=mysql_query("INSERT INTO ".USERS." (`username` ,`password` ,`user_fname` ,`user_lname`, `user_type` ,`user_date` ,`user_email`, `user_status`, `user_phone`, `user_mobile`, `user_country`, `user_state`, `user_city`, `user_addr`)VALUES ('$username', '$password', '$user_fname', '$user_lname', 'default', now(), '$user_email', 'a','$user_phone', '$user_mobile', '$user_country', '$user_state', '$user_city', '$user_addr')");
		///////// 	user mail	/////////////////////////
		/*$to1= $user_email;
		$subject1= "You are Registred successfully in ".WEBSITE_NAME;
		$body1= "<table>
			<tr><td>You may access your account after varification of your details</td></tr>
			<tr><td>After varification we will send you the details</td></tr>
			<tr><td colspan='2'>Thanking You</td></tr>
			</table> ";*/
		$to1= $user_email;
		$subject1= "Your Account verification in ".WEBSITE_NAME;
		$body1= "<table>
			<tr><td colspan='3'> Your Account Varification completed. You may access your account with your login details</td></tr>
			<tr><td colspan='3'>Your Login information is</td></tr>
			<tr><td>Username</td><td>:</td><td>$username</td></tr>
			<tr><td>Password</td><td>:</td><td>$password</td></tr>
			<tr><td colspan='2'>Thanking You</td></tr>
			</table> ";
		/////////////// 	Admin mail		/////////////////
		$to= ADMIN_EMAIL;
		$subject= "New User Registrion in ".WEBSITE_NAME;
		$body= "<table>
			<tr><td colspan='3'>Information ".WEBSITE_NAME."</td></tr>
			<tr><td colspan='3'>Contact information is</td></tr>
			<tr><td>Username</td><td>:</td><td>$username</td></tr>
			<tr><td>Email Id</td><td>:</td><td>$user_email</td></tr>
			<tr><td>Phone</td><td>:</td><td>$user_phone</td></tr>
			<tr><td colspan='2'>Thanking You</td></tr>
			</table> ";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.WEBSITE_NAME. "\r\n";
		if(mail($to, $subject, $body ,$headers)&& mail($to1, $subject1, $body1 ,$headers)){}
		if($_GET['pid']==''){
			echo "<script>location.replace('../".FRONT_THANKU."?act=reg')</script>";
		}else{
			$iid=mysql_insert_id();
			$qfet=mysql_fetch_array(mysql_query("select * from ".USERS." where user_id='$iid'"));
			$_SESSION['user_id']=$qfet['user_id'];
			$_SESSION['username']=$qfet['user_fname'];
			$sel=mysql_fetch_array(mysql_query("select * from ".PRODUCT." where pid='$_GET[pid]'"));
			$price= $sel['prod_price'];
			$ins=mysql_query("insert into ".CART." (`user_id`,`prod_id`,`price`,`quantity`) values ('$_SESSION[user_id]', '$_GET[pid]', '$price', '1')");
			echo "<script>location.replace('../".FRONT_CART."')</script>";
		}
		/*echo "<script>location.replace('../".FRONT_THANKU."?act=reg')</script>";*/
	}else{
		/*if($u1<>''){ echo "<script>location.replace('../".FRONT_REG."?$msg1=Username aleredy exists pls provide another username')</script>"; }
		if($u2<>''){ echo "<script>location.replace('../".FRONT_REG."?$msg2=Email aleredy exists pls provide another Email Id')</script>"; }*/
		$rt=$username.",".$user_fname.",".$user_lname.",".$user_email.",".$user_phone.",".$user_mobile.",".$user_country.",".$user_state.",".$user_city.",".$user_addr;
		if($u1<>'' && $u2<>''){
			echo "<script>location.replace('../".FRONT_REG."?act=new_prod&msg1=Username aleredy exists pls provide another username&msg2=Email aleredy exists pls provide another Email Id&val=$rt')</script>"; 
		}elseif($u1<>''){ 
			echo "<script>location.replace('../".FRONT_REG."?act=new_prod&msg1=Username aleredy exists pls provide another username&val=$rt')</script>"; 
		}elseif($u2<>''){ 
			echo "<script>location.replace('../".FRONT_REG."?act=new_prod&msg2=Email aleredy exists pls provide another Email Id&val=$rt')</script>";
		}
		
	}
	
}

if($_GET['act']=='change_password'){
	extract($_POST);
	//print_r($_POST);
	$com_un_valid 		=$valid->notempty($_POST['old']," Old Password Should not be Empty");
	$com_pw_valid 		=$valid->notempty($_POST['new']," New Password Should not be Empty");
	$com_pw_valid_size	=$valid->pass($_POST['new'],"length in between 6 and 20");
	$com_rpw_valid		=$valid->notempty($_POST['new1'],"Confirm Password Should not be Empty");
	$com_pws_valid		=$valid->samepass($_POST['new'] , $_POST['new1'],"Both passwords must be same");
	
	if($com_un_valid == '' && $com_pw_valid == '' && $com_pw_valid_size == '' && $com_rpw_valid == '' && $com_pws_valid == '')	{
		if($_POST['pw']==$_POST['old']){  
			//echo "aaaaaaaaaa";
			$update=mysql_query("update ".USERS." set `password`='".$new."' where `user_id`='".$_SESSION['user_id']."'");
			echo "<script>location.replace('../".FRONT_PROFILE."?act=show&msg=password change successfully')</script>";
		}else{
			echo "<script>location.replace('../".FRONT_PROFILE."?act=pass&msg=Old password is not correct. Enter correct password')</script>";
		}
	}else{
		echo "<script>location.replace('../".FRONT_PROFILE."?act=pass')</script>";
	}
}

if($_GET['act']=='edit_contact'){
	extract($_POST);
	$upd=mysql_query("update ".USERS." set `user_fname`='$user_fname', `user_lname`='$user_lname', `user_phone`='$user_phone', `user_mobile`='$user_mobile' where `user_id`='$_SESSION[user_id]'");
	echo "<script>location.replace('../".FRONT_PROFILE."?act=contact_show')</script>";
}

if($_GET['act']=='edit_addr'){
	extract($_POST);
	$upd=mysql_query("update ".USERS." set `user_country`='$user_country', `user_state`='$user_state', `user_city`='$user_city', `user_addr`='$user_addr' where `user_id`='$_SESSION[user_id]'");
	echo "<script>location.replace('../".FRONT_PROFILE."?act=addr_show')</script>";
}
///////////////////////////					CART TABLE			////////////////////////////////////
if($_GET['act']=='add_cart'){
	extract($_POST);
	$sel=mysql_fetch_array(mysql_query("select * from ".PRODUCT." where pid='$_GET[pid]'"));
	$cc=mysql_fetch_array(mysql_query("select * from ".CART." where prod_id='$_GET[pid]' and user_id='$_SESSION[user_id]' "));
	$ccnum=mysql_num_rows(mysql_query("select * from ".CART." where prod_id='$_GET[pid]' and user_id='$_SESSION[user_id]' "));
	if($reg1['user_type']=='seller'){					
		$res= $application->discount($sel['prod_price'],$reg1['user_discount']);
		$price= $res;
	}else{
		$price= $sel['prod_price'];
	}
	if($ccnum==''){
		$ins=mysql_query("insert into ".CART." (`user_id`,`prod_id`,`price`,`quantity`) values ('$_SESSION[user_id]', '$_GET[pid]', '$price', '1')");
	}else{
		$p=$cc['price']+ $price;
		$q=$cc['quantity']+1;
		//echo $p."<br>".$q;
		$upd=mysql_query("update ".CART." set `price`='$p', `quantity`='$q' where `cart_id`='$cc[cart_id]'");
	}
	echo "<script>location.replace('../".FRONT_CART."')</script>";
}
if($_GET['act']=='update_cart'){
	extract($_POST);
	$selCet = mysql_query("select * from ".CART." ");
	$roW = mysql_num_rows($selCet);
	$tabname=$carttab;
	//echo "rows---".$roW;
	$res = mysql_fetch_array($selCet);
	for($j=1;$j<=$roW;$j++)
	{
		$p=$_POST['price'.$j];
		$p=$p*$_POST['items'.$j];
		$update  = "UPDATE ".CART." SET `quantity` = '".$_POST['items'.$j]."', `price`='$p' where `cart_id` = '".$_POST['cart_id'.$j]."' ";
		//echo $update;
		mysql_query($update);
	}
	echo "<script>location.replace('../".FRONT_CART."')</script>";
}
if($_GET['act']=='cart_del'){
	$del=mysql_query("delete from ".CART." where cart_id='$_GET[cart_id]'");
	echo "<script>location.replace('../".FRONT_CART."')</script>";
}
if($_GET['act']=='shipping'){
	extract($_POST);
	$upd=mysql_query("update ".USERS." set `user_fname`='$user_fname', `user_phone`='$user_phone', `user_country`='$user_country', `user_state`='$user_state', `user_city`='$user_city', `user_addr`='$user_addr' where `user_id`='$_SESSION[user_id]'");
	echo "<script>location.replace('../".FRONT_CONFIRM."')</script>";
}
?>
