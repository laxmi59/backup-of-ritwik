<?php
/*
Template Name: Payment Processs
*/
/** DoDirectPayment NVP example; last modified 08MAY23.
 *
 *  Process a credit card payment. 
*/
switch($_POST['CardType']){
	case "MasterCard" :
		$PayCardType ="MasterCard"; break;
	case "VisaCard":
		$PayCardType ="Visa"; break;
	case "AmExCard":
		$PayCardType ="Amex"; break;
	case "DiscoverCard":
		$PayCardType ="Discover"; break;
	case "JCBCard":
		$PayCardType ="JCB"; break;
}
$environment = 'live';	// or 'beta-sandbox' or 'live'

/**
 * Send HTTP POST Request
 *
 * @param	string	The API method name
 * @param	string	The POST Message fields in &name=value pair format
 * @return	array	Parsed HTTP Response body
 */

//Array ( [first_name] => test [last_name] => [email] => [company] => [phone] => [pname] => [purl] => [billing_first_name] => [billing_last_name] => [billing_address1] => [billing_address2] => [billing_city] => [billing_state] => [billing_zip] => [CardType] => AmExCard [CardNumber] => 340000000000009 [ExpMon] => 2 [ExpYear] => 20 [cvc] => 123 ) 
function PPHttpPost($methodName_, $nvpStr_) {
	global $environment;

	// Set up your API credentials, PayPal end point, and API version.
	$API_UserName = urlencode('accounting_api1.affiliatemedia.com');
	$API_Password = urlencode('MRK8ZMA9FE5PVLNG');
	$API_Signature = urlencode('AjXCZYaCuEJEFXz1ZYmJmc3xR9HBAIlLRfFzsumHI0uIFMw3nEu6CocZ');
	$API_Endpoint = "https://api-3t.paypal.com/nvp";
	if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
	}
	$version = urlencode('51.0');

	// Set the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	// Turn off the server and peer verification (TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);

	// Set the API operation, version, and API signature in the request.
	$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

	// Set the request as a POST FIELD for curl.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	// Get response from the server.
	$httpResponse = curl_exec($ch);

	if(!$httpResponse) {
		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}

	// Extract the response details.
	$httpResponseAr = explode("&", $httpResponse);

	$httpParsedResponseAr = array();
	foreach ($httpResponseAr as $i => $value) {
		$tmpAr = explode("=", $value);
		if(sizeof($tmpAr) > 1) {
			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
		}
	}

	if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
		exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
	}

	return $httpParsedResponseAr;
}
//print_r($_POST);
extract($_POST);
//print_r($_POST);
if($_POST['CardType']){
	//mysql_query("insert into wpdb_custom_user_data set `package` = ".$package.", `first_name` = '".$first_name."', `last_name` = '".$last_name."', `email` = '".$email."', `company` = '".$company."', `phone` = '".$phone."', `program_name` = '".$program_name."', `program_url` = '".$program_url."', `billing_first_name` = '".$billing_first_name."', `billing_last_name` = '".$billing_last_name."', `billing_address1` = '".$billing_address1."', `billing_address2` = '".$billing_address2."', `billing_country` = 'US', `billing_state` = '".$billing_state."', `billing_city` = '".$billing_city."', `date`=now()");	
	mysql_query("insert into wpdb_custom_user_data set `package` = ".$package.", `first_name` = '".$first_name."', `last_name` = '".$last_name."', `email` = '".$email."', `company` = '".$company."', `phone` = '".$phone."', `program_name` = '".$program_name."', `program_url` = '".$program_url."', `billing_first_name` = '".$billing_first_name."', `billing_last_name` = '".$billing_last_name."', `billing_address1` = '".$billing_address1."', `billing_address2` = '".$billing_address2."', `billing_country` = '".$billing_country."', `billing_state` = '".$billing_state."', `billing_city` = '".$billing_city."', `billing_zip` = '".$billing_zip."', `billing_postal` = '".$billing_zip1."', `date`=now()");	
	$uid=mysql_insert_id();
}
if(base64_decode($package)==1){
$amount="299";
}elseif(base64_decode($package)==2){
$amount="499";
}/*else{
$amount
}*/
// Set request-specific fields.
$paymentType = urlencode('Sale');			//'Authorization'	// or 'Sale'
$firstName = urlencode($billing_first_name);
$lastName = urlencode($billing_last_name);
$creditCardType = urlencode($PayCardType);
$creditCardNumber = urlencode($CardNumber);
//$creditCardNumber = urlencode("4550387745343001");
$expDateMonth = $ExpMon;
// Month must be padded with leading zero
$padDateMonth = urlencode(str_pad($expDateMonth, 2, '0', STR_PAD_LEFT));

$expDateYear = urlencode($ExpYear);
$cvv2Number = urlencode($cvc);
//$cvv2Number = urlencode("711");
$address1 = urlencode($billing_address1);
$address2 = urlencode($billing_address2);
$city = urlencode($billing_city);
$state = urlencode($billing_state);
$zip = urlencode($billing_zip);
$country = urlencode($billing_country);	
$amount = urlencode($amount);			// US or other valid country code
//$amount = urlencode("0.01");
$currencyID = urlencode('USD');							// or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
$finaldate = $padDateMonth.$expDateYear;
// Add request-specific fields to the request string.
 $nvpStr =	"&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber".
			"&EXPDATE=$finaldate&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName".
			"&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";

// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = PPHttpPost('DoDirectPayment', $nvpStr);

if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
	mysql_query("update wpdb_custom_user_data set payment_status=1 where id=$uid");
	echo "<script>location.replace('http://www.affiliateprograms.com/directory/thank-you/?succ=".base64_encode($uid)."')</script>";
	
} else if("Failure" == $httpParsedResponseAr["ACK"])  {
	mysql_query("insert into wpdb_custom_payment_status (err_code, err_smsg, err_lmsg)values('".urldecode($httpParsedResponseAr['L_ERRORCODE0'])."', '".urldecode($httpParsedResponseAr['L_SHORTMESSAGE0'])."', '".urldecode($httpParsedResponseAr['L_LONGMESSAGE0'])."')");
	$iid=mysql_insert_id();
	mysql_query("update wpdb_custom_user_data set payment_status=2, err_id=".$iid." where id=$uid");
	/*echo "<script>location.replace('/directory/failure/?err=".base64_encode($iid)."')</script>";*/
	echo "<script>location.replace('https://www.affiliateprograms.com/directory/payment-info/?err=".base64_encode($uid)."')</script>";
}

?>