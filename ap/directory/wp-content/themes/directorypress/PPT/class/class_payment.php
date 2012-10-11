<?php

/***************** DO NOT EDIT THIS FILE *************************
******************************************************************

INFORMATION:
------------

This is a core theme file, you should not need to edit 
this file directly. Code changes maybe lost during updates.

LAST UPDATED: June 26th 2011
EDITED BY: MARK FAIL
------------------------------------------------------------------

******************************************************************/

class PremiumPressTheme_Payment {

	function CustomGateway($gateway=""){
	
		global $wpdb;
		
		if($gateway == "ewayNZ"){
 
			require_once(TEMPLATEPATH.'/PPT/gateways/class_ewayNZ.php');		

		}elseif($gateway == "ewayUK"){
 
			require_once(TEMPLATEPATH.'/PPT/gateways/class_ewayUK.php');
					
		}elseif($gateway == "ideal" && get_option('gateway_ideal') == "yes"){
				 
			require_once(TEMPLATEPATH.'/PPT/gateways/class_ideal.php');
		 
			  $amount      = str_replace(".","",$_POST['amount']*100);
			  $description = $_POST['desc']; 		  
			  $return_url  = get_option('ideal_return'); 
			  $report_url  = get_option('ideal_return');
			  $iDEAL = new iDEAL_Payment (get_option('ideal_ID'));
			  if ($iDEAL->createPayment($_POST['bank_id'], $amount, $description, $return_url, $report_url)) {
				  header('location: ' . $iDEAL->getBankURL());
				  die();
			  }else {
				  die('De betaling kon niet aangemaakt worden.');
			 }			  
	 
		}			
		 
	
	}


	function CheckUserID($orderID, $userdata){
	
		if(isset($userdata->ID) && is_numeric($userdata->ID) ){
		
			return $userdata->ID;
		
		}else{
		
			$uID = explode("-",$orderID);
			return $uID[1];
		
		}
	
	}

	/**
	* Checks to ensure that the data passed in the browser is for a valid order return.
	**/
	function CheckOrderID($return=""){
	
	global $wpdb, $userdata; get_currentuserinfo();

 		$OID = "";
		
		if(isset($_POST['customgateway']) && $_POST['customgateway'] == "blankform" ){
		
		
			// defaults
			$message = "";
			
			// Load in email addreses
			$emails = explode(",",get_option('gateway_blank_form_email'));
			if(is_array($emails)){
			
				$_POST['custom']['state'] = $_POST['form']['state'];
				foreach($_POST['custom'] as $key=>$value){		
				$message .= $key.": ".$value."\n";		
				}
				 
				// Send Emails
				foreach($emails as $email){	
					if(strlen($email) > 2){			
						wp_mail($email,"Online Order Notification #".$_POST['order_id'],$message);
					}
				}
				 
				$this->UpdateOrderStatus(5, $_GET['custom']['order_id']);				
				return "thankyou";	
			
			}else{
			
			die("No emails configured for form data.");
			
			}
		
			
		
		}elseif(isset($_POST['customgateway']) && $_POST['customgateway'] == "paypalpro" ){
		
 
 
 			// CHECK TO SEE IF THE ORDER HAS ALREADY BEEN PROCESSED;
			$result = mysql_query("SELECT order_status FROM ".$wpdb->prefix."orderdata WHERE ".$wpdb->prefix."orderdata.order_id='".strip_tags(PPTCLEAN($_POST['paypal_order_id']))."' LIMIT 1", $wpdb->dbh) 
			or die(mysql_error().' on line: '.__LINE__);							
			$array = mysql_fetch_assoc($result);			 
			if($array['order_status'] == 5){
				return "thankyou";
			}
		
			define('API_USERNAME', get_option('paypalpro_username'));
			define('API_PASSWORD', get_option('paypalpro_password'));
			define('API_SIGNATURE', get_option('paypalpro_sig'));
			require_once(TEMPLATEPATH.'/PPT/gateways/class_paypal_pro.php');			 
		
			$firstName 			= urlencode( $_POST['firstName']);
			$lastName 			= urlencode( $_POST['lastName']);
			$creditCardType 	= urlencode( $_POST['creditCardType']);
			$creditCardNumber 	= urlencode($_POST['creditCardNumber']);
			$expDateMonth 		= urlencode( $_POST['expDateMonth']);
			$padDateMonth 		= str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);
			$expDateYear 		= urlencode( $_POST['expDateYear']);
			$cvv2Number 		= urlencode($_POST['cvv2Number']);
			$address1 			= urlencode($_POST['address1']);
			$address2 			= urlencode($_POST['address2']);
			$city 				= urlencode($_POST['city']);
			$state 				= urlencode( $_POST['state']);
			$zip 				= urlencode($_POST['zip']);
			$amount 			= urlencode($_POST['amount']);
			$currencyCode		= get_option('paypalpro_currency');
			$paymentAction 		= urlencode("Sale");
		
			if($_POST['recurring'] == 1) // For Recurring
			{
				$profileStartDate = urlencode(date('Y-m-d h:i:s'));
				$billingPeriod = urlencode($_POST['billingPeriod']);// or "Day", "Week", "SemiMonth", "Year"
				$billingFreq = urlencode($_POST['billingFreq']);// combination of this and billingPeriod must be at most a year
				$initAmt = $amount;
				$failedInitAmtAction = urlencode("ContinueOnFailure");
				$desc = urlencode("Recurring $".$amount);
				$autoBillAmt = urlencode("AddToNextBilling");
				$profileReference = urlencode("Anonymous");
				$methodToCall = 'CreateRecurringPaymentsProfile';
				$nvpRecurring ='&BILLINGPERIOD='.$billingPeriod.'&BILLINGFREQUENCY='.$billingFreq.'&PROFILESTARTDATE='.$profileStartDate.'&INITAMT='.$initAmt.'&FAILEDINITAMTACTION='.$failedInitAmtAction.'&DESC='.$desc.'&AUTOBILLAMT='.$autoBillAmt.'&PROFILEREFERENCE='.$profileReference;
			}
			else
			{
				$nvpRecurring = '';
				$methodToCall = 'doDirectPayment';
			}
		
			$nvpstr='&PAYMENTACTION='.$paymentAction.'&AMT='.$amount.'&CREDITCARDTYPE='.$creditCardType.'&ACCT='.$creditCardNumber.'&EXPDATE='.         $padDateMonth.$expDateYear.'&CVV2='.$cvv2Number.'&FIRSTNAME='.$firstName.'&LASTNAME='.$lastName.'&STREET='.$address1.'&CITY='.$city.'&STATE='.$state.'&ZIP='.$zip.'&COUNTRYCODE=US&CURRENCYCODE='.$currencyCode.$nvpRecurring;
			$paypalPro = new paypal_pro(API_USERNAME, API_PASSWORD, API_SIGNATURE, '', '', FALSE, FALSE );
			$resArray = $paypalPro->hash_call($methodToCall,$nvpstr);
			$ack = strtoupper($resArray["ACK"]);
		
			if($ack != "SUCCESS")
			{
				$order_status = "error";
				
				die("<h1>Transaction Error</h1><p>".$resArray['L_LONGMESSAGE0']."</p><p>Please click back and check your details.</p>");
		
			}else{
			
				$this->UpdateOrderStatus(5, $_POST['paypal_order_id']);	
				
				//$userID =	$this->CheckUserID($_POST['paypal_order_id'],$userdata);
				//$emailID = get_option("email_order_after");			 
				//if(is_numeric($emailID) && $emailID != 0){				 
				//	SendMemberEmail($userID, $emailID);	 						
				//}
				
				// send to the admin
				$emailID1 = get_option("email_admin_neworder");			 
				if(is_numeric($emailID1) && $emailID1 != 0){				 
					SendMemberEmail("admin", $emailID1);	 						
				}
				
				//mail( "m", "test message", "test message");
							
				return "thankyou";
			
			} 
		
		
		
		
		}elseif(isset($_GET['sid'])){ // 2checkout
		
 			$order_id = $_POST['cart_order_id'];
			$this->UpdateOrderStatus(5, $order_id);
			return $order_id; 
		
		
		}elseif (isset($_GET['transaction_id']) ) { // IDEAL PAYMENT INTEGRATION
		
			require_once(TEMPLATEPATH.'/PPT/gateways/class_ideal.php');
			$iDEAL = new iDEAL_Payment (get_option('ideal_ID'));	
			$iDEAL->checkPayment($_GET['transaction_id']);
			if ($iDEAL->getPaidStatus() == true){	 
			
				$this->UpdateOrderStatus(5, $_GET['transaction_id']);				
				return "thankyou";
			
			}else{
				return "pending";	
			}
			
			
		}elseif(isset($_POST['custom']) && strlen($_POST['custom']) > 5){ $OID = $_POST['custom']; }
			elseif(isset($_POST['x_cust_id']) && strlen($_POST['x_cust_id']) > 5){ $OID = $_POST['x_cust_id']; }
				elseif(isset($_GET['custom']) && strlen($_GET['custom']) > 5){ $OID = $_GET['custom']; }
					elseif(isset($_GET['order_id']) && strlen($_GET['order_id']) > 5){ $OID = $_GET['order_id']; }
						elseif(isset($_GET['cm']) && strlen($_GET['cm']) > 5){ $OID = $_GET['cm']; }
		
		if($return == ""){ 
		
			if(strlen($OID) > 1){ return true; }else { return false; } 
		
		}else { 
		
			return $OID;
		
		}
	
	}
 
	function ChangeListing($orderID="",$status="draft"){
	
		global $wpdb;
		
		$d = explode("-",$orderID);	 
		
		if(is_numeric($d[0])){
		
			// thank you anthony fox
			$my_post = array();
			$my_post['ID'] = PPTCLEAN($d[0]);
			$my_post['post_status'] = $status;
			wp_update_post( $my_post );

 
		}
 
	
	}
		
	
	function PaymentStatus($orderID=""){
 
		global $wpdb; 
		
		/* ORDER STATUS
		// 0 = AWAITING PAYMENT
		// 3 = PAID
		// 5 = Payment Received
		// 6 = payment failed
		// 7 = payment pending
		// 8 = payment refunded */
		
		/* WE NEED TO DETERMIN WHAT POST VALUE IS THE CUSTOM VALUE
		 CONTAINING THE ORDER ID THIS CAN CHANGE WITH EACH PAYMENT MERCAHNT */ 
 		if(isset($_POST['cartId'])){ // worldpay
		
			$order_id = $_POST['cartId'];
			$this->UpdateOrderStatus(5, $order_id);
			return "thankyou";	
			
		}elseif(isset($_POST['transaction_id']) ){ // nochex	


		 	// send email			
			$emailID = get_option("email_order_after");			 
			if(is_numeric($emailID) && $emailID != 0){	
			
				// GET POST DATA FOR THE EMAILS
				$result = mysql_query("SELECT order_data FROM ".$wpdb->prefix."orderdata WHERE ".$wpdb->prefix."orderdata.order_id='".strip_tags(PPTCLEAN($_POST['transaction_id']))."' LIMIT 1", $wpdb->dbh) 
				or die(mysql_error().' on line: '.__LINE__);							
				$array = mysql_fetch_assoc($result);				
				$_POST['data'] = nl2br($array['order_data']);	
				$_POST['orderID'] = $_POST['transaction_id'];
						 
				SendMemberEmail($_POST['from_email'], $emailID);	 						
			}		
			
		
			//$this->InsertOrder("authorize");
			$order_id = $_POST['transaction_id'];
			$this->UpdateOrderStatus(5, $order_id);
			return "thankyou";	
						
		
		}elseif(isset($_POST['x_cust_id']) ){ // authorize 
			
		 	// send email			
			$emailID = get_option("email_order_after");			 
			if(is_numeric($emailID) && $emailID != 0){	
			
				// GET POST DATA FOR THE EMAILS
				$result = mysql_query("SELECT order_data FROM ".$wpdb->prefix."orderdata WHERE ".$wpdb->prefix."orderdata.order_id='".strip_tags(PPTCLEAN($_POST['x_cust_id']))."' LIMIT 1", $wpdb->dbh) 
				or die(mysql_error().' on line: '.__LINE__);							
				$array = mysql_fetch_assoc($result);				
				$_POST['data'] = nl2br($array['order_data']);	
				$_POST['orderID'] = $_POST['x_cust_id'];
						 
				SendMemberEmail($_POST['x_email'], $emailID);	 						
			}
		 
		 	//$this->InsertOrder("authorize");
			$order_id = $_POST['x_cust_id'];
			$this->UpdateOrderStatus(5, $order_id);
			return "thankyou";	
			
		}elseif(isset($_POST['custom'])  && isset($_POST['payment_status']) && strlen($_POST['payment_status']) > 1 ){ // paypal
		 
			//$this->InsertOrder("paypal",$orderID);
			$order_id = trim($_POST['custom']);
			
			// CHECK FOR SUBSCRIPTION PAYMENT			
			//if(strpos($txn_type, 'subscr') === false){
			
			//}else{
				
				// NORMAL PAYMENT
			 
				if ($_POST['payment_status'] == "Completed"){				
					
					$this->UpdateOrderStatus(5, $order_id);				
					return "thankyou";
			
				}elseif ($_POST['payment_status'] =="Pending"){
			
					$this->UpdateOrderStatus(7, $order_id);
					return "pending";
							
						
				} elseif ( ($_POST['payment_status'] == 'Reversed') || ($_POST['payment_status'] == 'Refunded') ) {
						
					$this->UpdateOrderStatus(8, $order_id);
					$this->ChangeListing($order_id);
			
				}else{	
				
					$this->UpdateOrderStatus(6, $order_id);	
					//$this->ChangeListing($order_id);
				}
			
			//}
		
			return "error";	
		
		}elseif(isset($_POST['order_id'])){ // custom gateway
		
			$order_id = $_POST['order_id'];
			
			$this->UpdateOrderStatus(5, $order_id);
			return "thankyou";	
		
		}elseif($orderID != ""){ // used as a last resort		
		
			$this->UpdateOrderStatus(5, $orderID);
			return "thankyou";			
		
		}

		return "thankyou";	
	 
	} 
	
	function GetOrderData($orderID){
	
		global $wpdb;
	
		$result = mysql_query("SELECT * FROM ".$wpdb->prefix."orderdata WHERE ".$wpdb->prefix."orderdata.order_id='".strip_tags(PPTCLEAN($orderID))."' LIMIT 1", $wpdb->dbh) 
		or die(mysql_error().' on line: '.__LINE__);							
		$array = mysql_fetch_assoc($result);			 
		if(isset($array['order_total'])){
				
			return $array;
				
		}else{
		
			return false;
			
		}	
	 
	}
	
	function UpdateOrderStatus($status, $order_id){
	
		global $wpdb; $POSTDATA="Date=".date('l jS \of F Y h:i:s A')."\n";
		
		if(strtolower(PREMIUMPRESS_SYSTEM) == "auctionpress"){
		
			$this->InsertOrder("paypal",$order_id,0);
		
		}
		
		foreach($_POST as $key=>$val){ $POSTDATA .= $key."=".$val."\n"; }
	
		mysql_query("UPDATE ".$wpdb->prefix."orderdata SET 
		order_status='".PPTCLEAN($status)."'
		WHERE order_id='".PPTCLEAN($order_id)."' LIMIT 1"); 
		
		
		$result = mysql_query("SELECT * FROM ".$wpdb->prefix."orderdata WHERE ".$wpdb->prefix."orderdata.order_id='".strip_tags(PPTCLEAN($order_id))."' LIMIT 1", $wpdb->dbh) 
		or die(mysql_error().' on line: '.__LINE__);							
		$array = mysql_fetch_assoc($result);			 
	 
		mysql_query("UPDATE ".$wpdb->prefix."orderdata SET 
		payment_data='".PPTCLEAN($POSTDATA." \n\n\n ".$array['payment_data'])."'
		WHERE order_id='".PPTCLEAN($order_id)."' LIMIT 1");
		
		// WE SHOULD USE THIS SPACE TO SEND THE AFTER PAYMENT EMAIL TO THE USER
		 if($status == 5 || $status == 7){
			$emailID = get_option("email_order_after");				 
			if(is_numeric($emailID) && $emailID != 0){
			
				/* here we setup post values for email content */
				$_POST['form'] 		= $array;				
				$_POST['data'] 		= nl2br($array['order_data']);	
				$_POST['orderID'] 	= $order_id;
				SendMemberEmail($array['order_email'], $emailID);	
					
			}	 
		 }
		 
		// die(print_r($_POST));
 	
		$this->CustomThemeCallbackFunction($order_id,$status);
	
	}
		
	
	function InsertOrder($method="paypal",$orderID="",$status=0){
 
		global $wpdb, $PPT, $userdata; get_currentuserinfo(); $POSTDATA = "";
		
		$ADD = explode("**",$userdata->jabber);
		
		// SET DEFAULTS
		if($_POST['form']['email'] == ""){ $_POST['payer_email'] = $userdata->user_email; } 		
		//if($userdata->wp_user_level == "10"){ $status="3"; }else{ $status="0"; }		
		foreach($_POST as $key=>$val){ $POSTDATA .= $key."=".$val."\n"; }  
		
		
		
			
			
		switch(strtolower(PREMIUMPRESS_SYSTEM)){
			
			
		case "shopperpress": { 	
 
			
			$OrderItems = "";
			 
			if(isset($_SESSION['ddc']['productsincart']) && is_array($_SESSION['ddc']['productsincart'])){
			
						
			foreach($_SESSION['ddc']['productsincart'] as $key => $qty) {  if(isset($_SESSION['ddc'][$key]['main_ID'])){	$productID = $_SESSION['ddc'][$key]['main_ID'];	}else{ $productID  =  $key; } 			
			$OrderItems .= $productID."x".$qty."";
			$TSKU = get_post_meta($productID, "SKU", true);			
			$OrderData .= "\r\n --------- ".SPEC($GLOBALS['_LANG']['_email1']).": ". $productID. " ------------- \r\n";
			$OrderData .= "\r\n Name: ".preg_replace('/[^\w\d_ -]/si', '',getProductName($productID)). "\r\n";
			$OrderData .= "\r\n Qty: ".$qty." \r\n";
			$OrderData .= "\r\n Price: ".$PPT->Price(getProductPrice($productID)*$qty,$_SESSION['currency_code'],$GLOBALS['premiumpress']['currency_position'],1)." \r\n";
			if(strlen($TSKU) > 0){ $OrderData .= "\r\n SKU: ".$TSKU." \r\n"; } 
			
			// ADD PRODUCT CUSTOM FIELDS 
			$CF=1; while($CF < 7){  
							
				if(isset($_SESSION['ddc'][$key]['custom'.$CF]) && $_SESSION['ddc'][$key]['custom'.$CF] !="na" && $_SESSION['ddc'][$key]['custom'.$CF] !="" && $_SESSION['ddc'][$key]['custom'.$CF] !='0'){
				
					 if($CF == 3 || $CF ==6){
					 
					 	 $txt = get_option('custom_field'.$CF). ": ".ShopperPressCustomFieldTxt($productID, $_SESSION['ddc'][$key]['custom'.$CF],$CF). "(".$_SESSION['ddc'][$key]['custom'.$CF].")";
					 
					 	 $OrderItems .= "-".$txt;
						 
						 $OrderData .= "\r\n".$txt."\r\n"; 
					 
					 }else{
					 
					 	$txt = get_option('custom_field'.$CF). ": ". $_SESSION['ddc'][$key]['custom'.$CF];
					 
					 	$OrderItems .= "-".$txt;
					
						$OrderData .="\r\n ".$txt. " \r\n"; 
							
					}	
						
				} 
				
				$CF++; } 
				
				if(isset($_SESSION['ddc'][$key]['custom7']) && $_SESSION['ddc'][$key]['custom7'] !="na" && $_SESSION['ddc'][$key]['custom7'] !=""){
				
					$OrderData .="\r\n ".SPEC($GLOBALS['_LANG']['_email2']).": ". stripslashes(get_option("imagestorage_link")).$_SESSION['ddc'][$key]['custom7']. " \r\n"; 
				
				}	
				
				$OrderItems .= ",";		
			
				// REDUCE THE QTY FOR EACH ITEM BY ONE
				mysql_query("UPDATE $wpdb->postmeta SET meta_value=meta_value-".$qty." WHERE meta_key='qty' AND post_id='".PPTCLEAN($productID)."' LIMIT 1");
			
			
			 }
			 
			 	if(!isset($GLOBALS['tax']) && isset($_POST['tax'])){
			$GLOBALS['tax'] = $_POST['tax'];
			}
			
			 		
 
							
				
			if(isset($_POST['form']['shippingmethod']) && $_POST['form']['shippingmethod'] != "" ){		
			$O1 ="\r\n ".$_POST['form']['shippingmethod_name'].": ".$PPT->Price($_POST['form']['shippingmethod'],$_SESSION['currency_code'],$GLOBALS['premiumpress']['currency_position'],1)." \r\n";				 
			}else{
			$O1 = "";
			}
			
			if(strlen($GLOBALS['shipping']) > 0){
			$OrderData .= "\r\n ".SPEC($GLOBALS['_LANG']['_email4']).": ".$PPT->Price($GLOBALS['shipping'],$_SESSION['currency_code'],$GLOBALS['premiumpress']['currency_position'],1). " \r\n";	
			}
			
			//if(strlen($_POST['weight']) > 0){
				//$OrderData .= "\r\n Weight: ".$_POST['weight'].get_option("shipping_weight_metric"). " \r\n";	
			//}
			
			if(isset($GLOBALS['tax']) && strlen($GLOBALS['tax']) > 0){
			$O3 = "\r\n Tax: ".$GLOBALS['tax']. " \r\n";
			}else{
			$O3 = "";
			}
			
			if($O1 != "" ||  $O3 != ""){
				$OrderData .= "\r\n --------- ".SPEC($GLOBALS['_LANG']['_email3'])." --------- \r\n".$O1.$O2.$O3;			 
			}
						 
			// COUPON CODES AND PROMOTIONS
						 
			if(isset($GLOBALS['promo']) && strlen($GLOBALS['promo']) > 0 ){ // promo is the coupon code
			
			$OrderData .= "\r\n --------- Coupon Code --------- \r\n";
			$OrderData .="\r\n Coupon: ".$GLOBALS['promo']. " \r\n";
			$OrderData .="\r\n Discount: ".$GLOBALS['coupon']. " \r\n";
			
			}elseif(isset($_POST['discount']) && strlen($_POST['discount']) > 0 ){
			
			$OrderData .= "\r\n --------- Coupon Code --------- \r\n";
			$OrderData .="\r\n Coupon: ".$_POST['coupon']. " \r\n";
			$OrderData .="\r\n Discount: ".$_POST['discount']. " \r\n";
			
			$GLOBALS['promo'] = $_POST['coupon'];
			$GLOBALS['coupon'] = $_POST['discount'];
			
			}
			
			if(isset($_POST['form']['discount'])){
			$GLOBALS['coupon'] = $_POST['form']['discount'];
			}
			
			 
             // DELIVERY ADDRESSS
			 
             $orderAddress = "\r\n".$_POST['form']['first_name']." ".$_POST['form']['last_name']."\r\n".$_POST['form']['company']."\r\n".$_POST['form']['address']." ".$_POST['form']['address2']." \r\n ".
			   $_POST['form']['city'].", ".$_POST['form']['postcode']." \r\n ".$_POST['form']['state']." \r\n".$_POST['form']['country']." \r\n".$_POST['form']['email']." \r\n ".$_POST['form']['phone']." \r\n ".$_POST['form']['VATnum']." \r\n";
			   
			  if(strlen(trim($orderAddress)) > 5){
			   
			   $OrderData .= "\r\n --------- ".SPEC($GLOBALS['_LANG']['_email5'])." --------- \r\n";
			   
			   $OrderData .= $orderAddress;
			   
			  }
			   
			 if(isset($_POST['shipping']['first_name']) && strlen($_POST['shipping']['first_name']) > 1){  
			 
			 $OrderData .= "\r\n --------- Requested Shipping ".SPEC($GLOBALS['_LANG']['_email5'])." --------- \r\n";	
			   
			$shippingAddress = "".$_POST['shipping']['first_name']." ".$_POST['shipping']['last_name']."\r\n".$_POST['shipping']['company']."\r\n".$_POST['shipping']['address']." ".$_POST['shipping']['address2']." \r\n ".
			 	$_POST['shipping']['city'].", ".$_POST['shipping']['postcode']." \r\n ".$_POST['shipping']['state']." \r\n ".$_POST['shipping']['country']." \r\n"." \r\n";
				
				$OrderData .= $shippingAddress;				
			} 
			
			// extra comments box
			if(strlen($_POST['form']['comments']) > 5){	
			
				$OrderData .= "\r\n --------- Extra Comments --------- \r\n";
				$OrderData .= "\r\n ".nl2br(stripslashes(strip_tags($_POST['form']['comments']))). " \r\n";	
			
			}	
			
			
			$_POST['form']['data'] = nl2br($OrderData);
			// MESSAGE TO THE ADMIN
			$emailID = get_option("email_admin_neworder");	
			if($emailID != "0" && strlen($emailID) > 0 ){
			 			 			 
			SendMemberEmail("admin", $emailID);	
			}
			// MESSAGE TO THE USER
			$emailID = get_option("email_message_neworder");	
			if($emailID != "0" && strlen($emailID) > 0 ){				 			 
			SendMemberEmail($userdata->ID, $emailID);	
			}
			
			

			//$oData["SAVE"] 				= true;
			}else{
			//$oData["SAVE"] 				= false;
			}
			
		
			  
			  //die(print_r($GLOBALS));
			  
			$oData = array();
			$oData["SAVE"] 				= true;
			$oData["userID"] 			= $userdata->ID;
			$oData["orderID"] 			= $orderID;	
			$oData["IP"] 				= $_SERVER['REMOTE_ADDR'];
			$oData["date"] 				= date("Y-m-d");					
			$oData["time"] 				= date("h:i:s");
			$oData["data"] 				= $OrderData;
			$oData["items"] 			= substr($OrderItems,0,-1);
			$oData["order_address"] 	= $orderAddress;			
			$oData["order_addressShip"] = $shippingAddress;				
			$oData["country"] 			= $_POST['form']['country'];
			$oData["email"] 			= $_POST['form']['email'];			
			$oData["total"] 			= $GLOBALS['total'];		
			$oData["subtotal"] 			= $GLOBALS['subtotal'];
			$oData["tax"] 				= $GLOBALS['tax'];
			$oData["coupon"] 			= $GLOBALS['coupon'];
			$oData["promo"] 			= $GLOBALS['promo'];
			$oData["currency"] 			= $_SESSION['currency_code'];
			$oData["shipping"] 			= $GLOBALS['shipping'];
			$oData["status"] 			= 0;
			$oData["username"] 			= $userdata->user_login;						
			$oData["paydata"] 			= $POSTDATA;
			 
			// die(print_r($oData));
			// UNSET THE CHECKOUT SESSIONS FOR SINGLE PAYMENTS
			if(get_option("checkout_setup") =="message" ){ 
			unset($_SESSION['ddc']);
			}
			 
			
			} break;
		
			
			case "auctionpress": {

				
					// AUCTION CREDITS ARE THE SAME AS THE ORDER AMOUNT, SO $20 IS 20 CREDITS
					$pp = explode("-",$orderID);				
				
					$oData = array();
					$oData["SAVE"] 				= true;
					$oData["userID"] 			= $pp[0];
					$oData["orderID"] 			= $orderID;	
					$oData["IP"] 				= $_SERVER['REMOTE_ADDR'];
					$oData["date"] 				= date("Y-m-d");					
					$oData["time"] 				= date("h:i:s");
					$oData["data"] 				= $GLOBALS['orderData'];
					$oData["items"] 			= $GLOBALS['orderItems'];
					$oData["order_address"] 	= $userdata->first_name." ".$userdata->last_name." ".$ADD[2]." ".$ADD[1]." ".$ADD[3]." ".$ADD[4]." ".$ADD[5];			
					$oData["order_addressShip"] = "";				
					$oData["country"] 			= $ADD[0];
					$oData["email"] 			= $_POST['form']['email'];			
					$oData["total"] 			= $pp[1];		
					$oData["subtotal"] 			= $pp[1];
					$oData["tax"] 				= "0";
					$oData["coupon"] 			= "";
					$oData["promo"] 			= "";
					$oData["currency"] 			= "";
					$oData["shipping"] 			= "";
					$oData["status"] 			= $status;
					$oData["username"] 			= $userdata->user_login;						
					$oData["paydata"] 			= $POSTDATA;
				
			} break;				
				
			default: {				
				
			 		  
					$oData = array();
					$oData["SAVE"] 				= true;
					$oData["userID"] 			= $userdata->ID;
					$oData["orderID"] 			= $orderID;	
					$oData["IP"] 				= $_SERVER['REMOTE_ADDR'];
					$oData["date"] 				= date("Y-m-d");					
					$oData["time"] 				= date("h:i:s");
					$oData["data"] 				= $GLOBALS['orderData'];
					$oData["items"] 			= $GLOBALS['orderItems'];
					$oData["order_address"] 	= $userdata->first_name." ".$userdata->last_name." ".$ADD[2]." ".$ADD[1]." ".$ADD[3]." ".$ADD[4]." ".$ADD[5];			
					$oData["order_addressShip"] = "";				
					$oData["country"] 			= $ADD[0];
					$oData["email"] 			= $_POST['form']['email'];			
					$oData["total"] 			= $GLOBALS['total'];		
					$oData["subtotal"] 			= $GLOBALS['subtotal'];
					$oData["tax"] 				= "0";
					$oData["coupon"] 			= "";
					$oData["promo"] 			= "";
					$oData["currency"] 			= $_SESSION['currency_code'];
					$oData["shipping"] 			= "";
					$oData["status"] 			= $status;
					$oData["username"] 			= $userdata->user_login;						
					$oData["paydata"] 			= $POSTDATA;
				 
				} break;
			
			
			
			}
			
			// SAVE THE ORDER DATA
			$this->SaveOrder($oData); 
	
	}
		

	
	
	
	//************************************************ CUSTOM THEME CALLBACK FUNCTIONS ***********************************// 
	
	
	function CustomThemeCallbackFunction($orderID, $status){
	
	global $wpdb,$PPT, $userdata;
	
	
	
		switch(strtolower(PREMIUMPRESS_SYSTEM)){
		
			case "auctionpress": {  
			
				// GET THE NUMBER OF CREDITS FOR THIS ORDER
				$result = mysql_query("SELECT order_total, cus_id FROM ".$wpdb->prefix."orderdata WHERE ".$wpdb->prefix."orderdata.order_id='".strip_tags(PPTCLEAN($orderID))."' LIMIT 1", $wpdb->dbh) 
				or die(mysql_error().' on line: '.__LINE__);							
				$array = mysql_fetch_assoc($result);	
				 	 
				if(strlen($array['order_total']) > 0){
				
					mysql_query("UPDATE ".$wpdb->usermeta." SET meta_value=meta_value+".PPTCLEAN($array['order_total'])." WHERE meta_key='aim' AND user_id='".$array['cus_id']."' LIMIT 1"); 
		 
				}
			
			} break;
			
			
			case "directorypress": {
			
				// SEPERATE THE ORDER DATA
				$oData = explode("-",$orderID);
				
				//die(print_r($oData));
				
				// GET THE DATA FROM THE ORDER ID
				$packdata = get_option("packages");
				 
				 update_post_meta($oData[0], "packageID", $oData[3] );	
				 update_post_meta($oData[0], "expires", $packdata[$oData[3]]['expire'] );
				 if($packdata[$oData[3]]['a5']  == 1){	
				 update_post_meta($oData[0], "featured", "yes" );
				 }		
			
			
			} break; 
			
			
			case "shopperpress": {		
			 
			
 
				if (strpos($orderID, "CREDITS") === false) { } else {
				
					// CREDITS ARE THE SAME AS THE ORDER AMOUNT, SO $20 IS 20 CREDITS
					$pp = explode("-",$orderID);				
				
					$oData = array();
					$oData["SAVE"] 				= true;
					$oData["userID"] 			= $pp[0];
					$oData["orderID"] 			= $orderID;	
					$oData["IP"] 				= $_SERVER['REMOTE_ADDR'];
					$oData["date"] 				= date("Y-m-d");					
					$oData["time"] 				= date("h:i:s");
					$oData["data"] 				= $pp[1]." credits";
					$oData["items"] 			= "";
					$oData["order_address"] 	= $userdata->first_name." ".$userdata->last_name." ".$ADD[2]." ".$ADD[1]." ".$ADD[3]." ".$ADD[4]." ".$ADD[5];			
					$oData["order_addressShip"] = "";				
					$oData["country"] 			= $ADD[0];
					$oData["email"] 			= $_POST['form']['email'];			
					$oData["total"] 			= $pp[1];		
					$oData["subtotal"] 			= $pp[1];
					$oData["tax"] 				= "0";
					$oData["coupon"] 			= "";
					$oData["promo"] 			= "";
					//$oData["currency"] 			= $_SESSION['currency_symbol'];
					$oData["shipping"] 			= "";
					$oData["status"] 			= $status;
					$oData["username"] 			= $userdata->user_login;						
					$oData["paydata"] 			= $POSTDATA;
					
					// SAVE THE ORDER DATA
					$this->SaveOrder($oData);
				
					// GET THE NUMBER OF CREDITS FOR THIS ORDER
					mysql_query("UPDATE ".$wpdb->usermeta." SET meta_value=meta_value+".PPTCLEAN($pp[1])." WHERE meta_key='aim' AND user_id='".$userdata->ID."' LIMIT 1"); 
				
				
				}			
			
			} break; 
			
			
			case "moviepress": {
			
				// SEPERATE THE ORDER DATA
				$oData = explode("-",$orderID); 
				
				// UPDATE EXISTING MEMBER ACCOUNT
				if(is_numeric($oData[0]) && $oData[1] == "MEMBERSHIP"){
				
				//now many days till expiry?				 
				$PACKAGE_OPTIONS = get_option("packages");				 
				
				$SQL = "UPDATE ".$wpdb->usermeta." SET meta_value=('a:4:{s:11:\"user_status\";s:6:\"active\";s:12:\"user_package\";s:1:\"".$oData[2]."\";s:20:\"user_package_expires\";s:10:\"".date('d-m-Y', strtotime("+".$PACKAGE_OPTIONS[$oData[2]]['expire']." days"))."\";s:4:\"text\";s:0:\"\";}') WHERE meta_key='yim' AND user_id='".$oData[0]."' LIMIT 1";  
				
				mysql_query($SQL);
				}elseif($oData[0] == "NEWUSER"){
				
				}
				
				 
			
			} break; 
		
		
		}
		
		// UPDATE THE LISTING TO APPROVED AFTER PAYMENT
		if($status ==5){
		
			$this->ChangeListing($orderID,"publish");
		
		}
	
	
	
	}
	
	
	
	
	
	
	
	
function SaveOrder($oData){

global $wpdb;
			
	if($oData["SAVE"]){
					
		mysql_query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."orderdata` (
					  `autoid` mediumint(10) NOT NULL AUTO_INCREMENT,
					  `cus_id` int(10) NOT NULL,
					  `order_id` varchar(50) NOT NULL,
					  `order_ip` varchar(100) NOT NULL,
					  `order_date` date NOT NULL,
					  `order_time` time NOT NULL,
					  `order_data` blob NOT NULL,
					  `order_items` varchar(255) NOT NULL,
					  `order_address` blob NOT NULL,
					  `order_addressShip` blob NOT NULL,
					  `order_country` varchar(150) NOT NULL,
					  `order_email` varchar(255) NOT NULL,
					  `order_total` varchar(10) NOT NULL,
					  `order_subtotal` varchar(10) NOT NULL,
					  `order_tax` varchar(10) NOT NULL,
					  `order_coupon` varchar(10) NOT NULL,
					  `order_couponcode` varchar(100) NOT NULL,
					  `order_currencycode` varchar(10) NOT NULL,
					  `order_shipping` varchar(10) NOT NULL,
					  `order_status` int(1) NOT NULL DEFAULT '0',
					  `cus_name` varchar(100) NOT NULL,
					  `payment_data` blob NOT NULL,
					  PRIMARY KEY (`autoid`))");
					
		$oData = PPTCLEAN($oData); // CLEAN THE DATA
					 
		$result = mysql_query("SELECT count(*) AS total FROM ".$wpdb->prefix."orderdata WHERE ".$wpdb->prefix."orderdata.order_id='".strip_tags($oData["orderID"])."'", $wpdb->dbh) 
		or die(mysql_error().' on line: '.__LINE__);							
		$array = mysql_fetch_assoc($result);
									 
		if($array['total'] ==0){ 
		
		if($oData["userID"] == ""){ $oData["userID"] = 0; }
						
		$SQL = "INSERT INTO ".$wpdb->prefix."orderdata ( `cus_id`, `order_id`, `order_ip`, `order_date`, `order_time`, order_data, `order_items`, order_address, order_addressShip, `order_country`, `order_email`, `order_total`, `order_subtotal`, `order_tax`, `order_coupon`, `order_couponcode`, `order_currencycode`, `order_shipping`, `order_status`, cus_name, payment_data) 
		VALUES ('".$oData["userID"]."', '".$oData["orderID"]."', '".$oData["IP"]."', '".$oData["date"]."', '".$oData["time"]."', '".$oData["data"]."',  '".$oData["items"]."', '".$oData["order_address"]."', '".$oData["order_addressShip"]."', '".$oData["country"]."', '".$oData["email"]."', '".$oData["total"]."', '".$oData["subtotal"]."', '".$oData["tax"]."', '".$oData["coupon"]."', '".$oData["promo"]."', '".$oData["currency"]."', '".$oData["shipping"]."', '".$oData["status"]."', '".$oData["username"]."','".$oData["paydata"]."')";			
			 
		 
		mysql_query($SQL);
						
		}
					
	}	 
}	
 

}	

?>