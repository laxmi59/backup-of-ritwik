<?php
require('authorizenet.cim.class.php');

// getCustomerProfileRequest()

$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);
$cim->setParameter('order_purchaseOrderNumber', '2157651159'); // Numeric (required)

$cim->order_purchaseOrderNumber();
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