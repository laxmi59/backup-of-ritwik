<?php
require('authorizenet.cim.class.php');

// getCustomerProfileRequest()

$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);

$cim->setParameter('merchantCustomerId', 'rama'); // (optional)
$cim->setParameter('description', 'edit testing'); // (optional)
$cim->setParameter('email', 'rama@ritwik.com'); // (optional)
$cim->setParameter('customerProfileId', '3093161'); // Numeric (required)

$cim->updateCustomerProfileRequest();


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