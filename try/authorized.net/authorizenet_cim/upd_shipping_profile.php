<?php
require('authorizenet.cim.class.php');

// getCustomerProfileRequest()

$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);

	// updateCustomerShippingAddressRequest()
	$cim->setParameter('shipTo_firstName', 'rama'); // Up to 50 characters (no symbols)
	$cim->setParameter('shipTo_lastName', 'laxmi'); // Up to 50 characters (no symbols)
	$cim->setParameter('shipTo_company', 'ritwik, Inc.'); // Up to 50 characters (no symbols) (optional)
	$cim->setParameter('shipTo_address', 'banjarahills'); // Up to 60 characters (no symbols)
	$cim->setParameter('shipTo_city', 'hyderabad'); // Up to 40 characters (no symbols)
	$cim->setParameter('shipTo_state', 'Ap'); // A valid two-character state code (US only) (optional)
	$cim->setParameter('shipTo_zip', '500001'); // Up to 20 characters (no symbols)
	$cim->setParameter('shipTo_country', 'India'); // Up to 60 characters (no symbols) (optional)
	$cim->setParameter('shipTo_phoneNumber', '666-666-6666'); // Up to 25 digits (no letters) (optional)
	$cim->setParameter('shipTo_faxNumber', '555-555-5555'); // Up to 25 digits (no letters) (optional)
	
	// Payment gateway assigned ID associated with the customer profile
	$cim->setParameter('customerProfileId', '3093161'); // Numeric (required)
	
	// Payment gateway assigned ID associated with the customer shipping address
	$cim->setParameter('customerAddressId', '2752107'); // Numeric (required)
	
	$cim->updateCustomerShippingAddressRequest();

	

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