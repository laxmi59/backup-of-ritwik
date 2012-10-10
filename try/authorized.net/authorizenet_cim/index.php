<?php
require('authorizenet.cim.class.php');


	// createCustomerProfileRequest()
	
	$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);
	
	// Create new customer profile
  
    $cim->setParameter('description','Description of customer');
    $cim->setParameter('merchantCustomerId',time());
    $cim->setParameter('email','test@domain.com');
	
	// Some Billing address information is required and some is optional 
	// depending on your Address Verification Service (AVS) settings 
	// creditCard payment method - (aka creditcard)
	$cim->setParameter('paymentType', 'creditCard');
	$cim->setParameter('cardNumber', '370000000000002');
	$cim->setParameter('expirationDate', '2010-01'); // (YYYY-MM)
	
	// bankAccount payment method - (aka echeck) 
	$cim->setParameter('accountType', 'checking'); // (checking, savings or businessChecking)
	$cim->setParameter('nameOnAccount', 'Ray Solomon');
	$cim->setParameter('echeckType', 'WEB'); // (CCD, PPD, TEL or WEB)
	$cim->setParameter('bankName', 'Bank of America');
	$cim->setParameter('routingNumber', '000000000');
	$cim->setParameter('accountNumber', '370000000000002');
	
	$cim->setParameter('billTo_firstName', 'Ray'); // Up to 50 characters (no symbols)
	$cim->setParameter('billTo_lastName', 'Solomon'); // Up to 50 characters (no symbols)
	//$cim->setParameter('billTo_company', 'Acme, Inc.'); // Up to 50 characters (no symbols) (optional)
	$cim->setParameter('billTo_address', 'My Address'); // Up to 60 characters (no symbols)
	$cim->setParameter('billTo_city', 'My City'); // Up to 40 characters (no symbols)
	$cim->setParameter('billTo_state', 'AZ'); // A valid two-character state code (US only) (optional)
	$cim->setParameter('billTo_zip', '85282'); // Up to 20 characters (no symbols)
	$cim->setParameter('billTo_country', 'US'); // Up to 60 characters (no symbols) (optional)
	//$cim->setParameter('billTo_phoneNumber', '555-555-5555'); // Up to 25 digits (no letters) (optional)
	//$cim->setParameter('billTo_faxNumber', '444-444-4444'); // Up to 25 digits (no letters) (optional)
	
	// In this method, shipping information is required because it reduces an extra
	// step from having to create a shipping address in the future, therefore you can simply update it when needed.
	// You can populate it with the billing info if you don't have an order form with shipping details.
	$cim->setParameter('shipTo_firstName', 'James'); // Up to 50 characters (no symbols)
	$cim->setParameter('shipTo_lastName', 'Beistle'); // Up to 50 characters (no symbols)
	//$cim->setParameter('shipTo_company', 'Acme, Inc.'); // Up to 50 characters (no symbols) (optional)
	$cim->setParameter('shipTo_address', 'My Address'); // Up to 60 characters (no symbols)
	$cim->setParameter('shipTo_city', 'My City'); // Up to 40 characters (no symbols)
	$cim->setParameter('shipTo_state', 'AZ'); // A valid two-character state code (US only) (optional)
	$cim->setParameter('shipTo_zip', '85282'); // Up to 20 characters (no symbols)
	$cim->setParameter('shipTo_country', 'US'); // Up to 60 characters (no symbols) (optional)
	$cim->setParameter('shipTo_phoneNumber', '555-555-5555'); // Up to 25 digits (no letters) (optional)
	$cim->setParameter('shipTo_faxNumber', '444-444-4444'); // Up to 25 digits (no letters) (optional)
	
	// A receipt from authorize.net will be sent to the email address defined here
	$cim->setParameter('email', 'support@trafficregenerator.com'); // Up to 255 characters (optional)
	
	$cim->setParameter('customerType', 'individual'); // individual or business (optional)
	
	$cim->createCustomerProfileRequest();
	




if ($cim->isSuccessful())
{
	/*echo "<br>".$cim->response;
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
	echo "</pre>";*/
	echo "<br> customerProfileId: ".$cim->customerProfileId;
	$get_cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);
	// Payment gateway assigned ID associated with the customer profile
	$get_cim->setParameter('customerProfileId', '3093390'); // Numeric (required)
	$get_cim->getCustomerProfileRequest();
	echo "<br> customerPaymentProfileId: ".$get_cim->customerPaymentProfileId;
	echo "<br> customerAddressId: ".$get_cim->customerAddressId;
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