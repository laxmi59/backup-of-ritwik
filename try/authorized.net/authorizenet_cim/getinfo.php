<?php
require('authorizenet.cim.class.php');

// getCustomerProfileRequest()

$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);

// Payment gateway assigned ID associated with the customer profile
/*$cim->setParameter('customerProfileId', '3093390'); // Numeric (required)
$cim->getCustomerProfileRequest();*/

$cim->setParameter('customerProfileId', '3093161'); // Numeric (required)
$cim->setParameter('customerPaymentProfileId', '2677904'); // Numeric (required)
$cim->getCustomerPaymentProfileRequest();

/*$cim->setParameter('customerProfileId', '3093161'); // Numeric (required)
$cim->setParameter('customerAddressId', '2752107'); // Numeric (required)
$cim->getCustomerShippingAddressRequest();*/

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
	//echo $cim->creditCard;
	echo "<br>".$cim->cardNumber;
	echo "<br>".$cim->expirationDate;
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