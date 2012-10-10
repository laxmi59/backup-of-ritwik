<?php
include_once("wp-load.php");
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');
session_start();//Session start//
//Getting the sessions values to the variabes//
$email=$_SESSION['currentuser']['email'];
$password=base64_encode($_SESSION['currentuser']['password']);
$firstname=$_SESSION['currentuser']['firstname'];
$lastname=$_SESSION['currentuser']['lastname'];
$phone_home=$_SESSION['currentuser']['phone_home'];
$phone_work=$_SESSION['currentuser']['phone_work'];
$phone_cell=$_SESSION['currentuser']['phone_cell'];
$fax=$_SESSION['currentuser']['fax'];
$billing_address=$_SESSION['currentuser']['billing_address'];
$billing_city=$_SESSION['currentuser']['billing_city'];
$billing_country=$_SESSION['currentuser']['billing_country'];
$billing_state=$_SESSION['currentuser']['billing_state'];
$billing_zipcode=$_SESSION['currentuser']['billing_zipcode'];
$shipping_address=$_SESSION['currentuser']['shipping_address'];
$shipping_city=$_SESSION['currentuser']['shipping_city'];
$shipping_country=$_SESSION['currentuser']['shipping_country'];
$shipping_state=$_SESSION['currentuser']['shipping_state'];
$shipping_zipcode=$_SESSION['currentuser']['shipping_zipcode'];
$label=$_SESSION['currentuser']['labelno'];
$cardtype=$_REQUEST['card_cardType'];
$cardnumber=$_REQUEST['card_accountNumber'];
$expmonth=$_REQUEST['card_expirationMonth'];
$expyear=$_REQUEST['card_expirationYear'];
$membershiptype=$_REQUEST['membership'];
$price=$_REQUEST['amount'];
$hidexsistcode=$_SESSION['currentuser']['hidexsistcode'];
//echo "<pre>";print_r($_SESSION);echo "</pre>";exit;
//Getting the sessions values to the variabes eof//

if(isset($label) and $label!="") {  //If Condition for the User Who have Label and come to register their Label(New Customer)

		$labeldetails=getLabeldetails($label);//get Label details
		//Inserting the User Contact info to the Db//
		$insertUserInfoQuery="insert into contactdetails(firstname,lastname,email,password,phone_home,phone_work,phone_cell,fax,billing_address,billing_city,billing_country,billing_state,billing_zipcode,shipping_address,shipping_city,shipping_country,	shipping_state,shipping_zipcode,cardtype,cardnumber,expmonth,expyear,membershiptype,price,date) values('$firstname','$lastname','$email','$password','$phone_home','$phone_work','$phone_cell','$fax','$billing_address','$billing_city','$billing_country','$billing_state','$billing_zipcode','$shipping_address','$shipping_city','$shipping_country','$billing_state','$shipping_zipcode','$cardtype','$cardnumber','$expmonth','$expyear','$membershiptype','$price',now())"; 
		$exeUserInfoQuery=mysql_query($insertUserInfoQuery);
		//Inserting the User Contact info to the Db eof//
			
		$userId=@mysql_insert_id();		
		$assignLabel=assignLabel2client($userId,$labeldetails['label_id']);//assigning Label to the Registered User
		$book=bookTheLabel($labeldetails['labelno']);
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.RecoverLink. "\r\n";
		$body="your LabelNO: ".$labeldetails['labelno'];
		mail($email,"Regarding RecoverLink Label",$body,$headers);
				
		unset($_SESSION['currentuser']); //Removing the Current Customer details
		wp_redirect(get_option('siteurl') . '/get-started?msg=succ');exit;
} //eof if(isset($label) and $label!="")


if(isset($hidexsistcode) and $hidexsistcode!="") {//If condition for the User nedding more labels

       	$labeldetails=getLabeldetails($hidexsistcode);//get Exsisting Label details
		$userId=assignedLabelContId($labeldetails['label_id']); //To get User contactdetails Id
		$unusedlabel=getUnusedLabels();//get Label details
		//$assignLabel=assignLabel2client($userId['contactdet_id'],$unusedlabel['label_id']);//assigning Label to the Registered User
		
		$getLabel=mysql_fetch_object(mysql_query("SELECT * FROM labels WHERE STATUS =0 ORDER BY RAND() LIMIT 0 , 1"));
		$book=bookTheLabel($getLabel->labelno);
		$assignLabel=assignLabel2client($userId['contactdet_id'],$getLabel->label_id);
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.RecoverLink. "\r\n";
		$body="your LabelNO: ".$getLabel->labelno;
		mail($email,"Regarding RecoverLink Label",$body,$headers);
		
		
		unset($_SESSION['currentuser']); //Removing the Current Customer details
		wp_redirect(get_option('siteurl') . '/get-started?msg=succ');exit;
		
}//eof if(isset($hidexsistcode) and $hidexsistcode!="")



if($hidexsistcode=="" and $label=="") {//If condition for the Very New User 
	$labeldetails=getUnusedLabels();//get Label details
	$insertUserInfoQuery="insert into contactdetails(firstname,lastname,email,password,phone_home,phone_work,phone_cell,fax,billing_address,billing_city,billing_country,billing_state,billing_zipcode,shipping_address,shipping_city,shipping_country,	shipping_state,shipping_zipcode,cardtype,cardnumber,expmonth,expyear,membershiptype,price,date) values('$firstname','$lastname','$email','$password','$phone_home','$phone_work','$phone_cell','$fax','$billing_address','$billing_city','$billing_country','$billing_state','$billing_zipcode','$shipping_address','$shipping_city','$shipping_country','$billing_state','$shipping_zipcode','$cardtype','$cardnumber','$expmonth','$expyear','$membershiptype','$price',now())"; 
	$exeUserInfoQuery=mysql_query($insertUserInfoQuery);
	//Inserting the User Contact info to the Db eof//
	
	$userId=@mysql_insert_id();		
	//$assignLabel=assignLabel2client($userId,$labeldetails['label_id']);//assigning Label to the Registered User
	
	
	$getLabel=mysql_fetch_object(mysql_query("SELECT * FROM labels WHERE STATUS =0 ORDER BY RAND() LIMIT 0 , 1"));
	$book=bookTheLabel($getLabel->labelno);
	$assignLabel=assignLabel2client($userId,$getLabel->label_id);
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.RecoverLink. "\r\n";
	$body="your LabelNO: ".$getLabel->labelno;
	mail($email,"Regarding RecoverLink Label",$body,$headers);
	
	
	
	unset($_SESSION['currentuser']); //Removing the Current Customer details
	
	
	
	
	wp_redirect(get_option('siteurl') . '/get-started?msg=succ');exit;
}





?>
