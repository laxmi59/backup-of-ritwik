<?php
require('authorizenet.cim.class.php');

// getCustomerProfileRequest()

$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);
	
	// Merchant-assigned reference ID for the request
//$cim->setParameter('refId', 'my unique ref id'); // Up to 20 characters (optional)
	
	// Payment gateway assigned ID associated with the customer profile
$cim->setParameter('customerProfileId', '3093365'); // Numeric (required)
	
$cim->deleteCustomerProfileRequest();
if ($cim->isSuccessful())
{
	//echo "<br>".$cim->response;
	/*echo "YES<br>".$cim->directResponse;
	echo "<br>".$cim->validationDirectResponse;
	echo "<br>".$cim->resultCode;
	echo "<br>".$cim->code;
	echo "<br>".$cim->text;
	echo "<br>".$cim->refId;
	echo "<br>".$cim->customerProfileId;
	echo "<br>".$cim->customerPaymentProfileId;
	echo "<br>".$cim->customerAddressId;*/
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
