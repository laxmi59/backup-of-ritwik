<?php
require('authorizenet.cim.class.php');

// getCustomerProfileRequest()

$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);
	// updateCustomerPaymentProfileRequest()
	// Choose a payment type - (creditCard or bankAccount) REQUIRED
	// creditCard payment method - (aka creditcard) 
	$cim->setParameter('paymentType', 'creditCard');
	$cim->setParameter('cardNumber', '6011000000000012');
	$cim->setParameter('expirationDate', '2012-01'); // (YYYY-MM)
	
	// bankAccount payment method - (aka echeck) 
	$cim->setParameter('accountType', 'savings'); // (checking, savings or businessChecking)
	$cim->setParameter('nameOnAccount', 'rama.ritwik');
	$cim->setParameter('echeckType', 'WEB'); // (CCD, PPD, TEL or WEB)
	$cim->setParameter('bankName', 'hdfc');
	$cim->setParameter('routingNumber', '000000000');
	$cim->setParameter('accountNumber', '0000000000000');
	
	
	// depending on your Address Verification Service (AVS) settings 
	$cim->setParameter('billTo_firstName', 'rama'); // Up to 50 characters (no symbols)
	$cim->setParameter('billTo_lastName', 'laxmi'); // Up to 50 characters (no symbols)
	$cim->setParameter('billTo_company', 'ritwik, Inc.'); // Up to 50 characters (no symbols) (optional)
	$cim->setParameter('billTo_address', 'banjarahills'); // Up to 60 characters (no symbols)
	$cim->setParameter('billTo_city', 'Hyderabad'); // Up to 40 characters (no symbols)
	$cim->setParameter('billTo_state', 'Ap'); // A valid two-character state code (US only) (optional)
	$cim->setParameter('billTo_zip', '500001'); // Up to 20 characters (no symbols)
	$cim->setParameter('billTo_country', 'India'); // Up to 60 characters (no symbols) (optional)
	$cim->setParameter('billTo_phoneNumber', '666-666-6666'); // Up to 25 digits (no letters) (optional)
	$cim->setParameter('billTo_faxNumber', '555-555-5555'); // Up to 25 digits (no letters) (optional)
	
	
	// Payment gateway assigned ID associated with the customer profile
	$cim->setParameter('customerProfileId', '3093161'); // Numeric (required)
	
	// Payment gateway assigned ID associated with the customer payment profile
	$cim->setParameter('customerPaymentProfileId', '2677904'); // Numeric (required)
	
	$cim->updateCustomerPaymentProfileRequest();
	

if ($cim->isSuccessful())
{
	//echo "<br>".$cim->response;
	echo "YES<br>".$cim->directResponse;
	echo "<br>".$cim->validationDirectResponse;
	echo "<br>".$cim->resultCode;
	echo "<br>".$cim->code;
	echo "<br>".$cim->text;
	echo "<br>".$cim->refId;
	echo "<br>".$cim->customerProfileId;
	echo "<br>".$cim->customerPaymentProfileId;
	echo "<br>".$cim->customerAddressId;
	echo "<br><pre>";
	print_r($cim->response);
	echo "</pre>";
}
else
{
	echo "NO<br>".$cim->directResponse;
	echo "<br>".$cim->validationDirectResponse;
	echo "<br>".$cim->resultCode;
	echo "<br>".$cim->code;
	echo "<br>".$cim->text;
	echo "<br><pre>";
	print_r($cim->error_messages);
	echo "</pre>";
	
}?>