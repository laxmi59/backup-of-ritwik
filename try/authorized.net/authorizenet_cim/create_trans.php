<?php
require('authorizenet.cim.class.php');

// getCustomerProfileRequest()

$cim = new AuthNetCim('733N7TvPF2zx', '6bAy8253FK2fR55b', true);
	// createCustomerProfileTransactionRequest()
	// Total Amount: This amount should include all other amounts such as tax amount, shipping amount, etc.
	$cim->setParameter('transaction_amount', '9.00'); // Up to 4 digits with a decimal (required)
	// This amount must be included in the total amount for the transaction. (optional)
	$cim->setParameter('tax_amount', '1.00'); // Up to 4 digits with a decimal point (no dollar symbol) (optional)
	$cim->setParameter('tax_name', 'vat'); // Up to 31 characters (optional)
	$cim->setParameter('tax_description', 'value added tax'); // Up to 255 characters (optional)
	// This amount must be included in the total amount for the transaction. (optional)
	$cim->setParameter('shipping_amount', '1.00'); // Up to 4 digits with a decimal point (no dollar symbol) (optional)
	$cim->setParameter('shipping_name', 'ffc'); // Up to 31 characters (optional)
	$cim->setParameter('shipping_description', 'first flight courier'); // Up to 255 characters (optional)
	// This amount must be included in the total amount for the transaction. (optional)
	$cim->setParameter('duty_amount', '1.00'); // Up to 4 digits with a decimal point (no dollar symbol) (optional)
	$cim->setParameter('duty_name', 'duty'); // Up to 31 characters (optional)
	$cim->setParameter('duty_description', 'customs duty'); // Up to 255 characters (optional)
	
	// LineItems: (Contains line item details about the order.) (optional)
	// Up to 30 distinct instances of this element may be included per transaction to describe items included in the order.
	// Below is an example of adding LineItems into a multidimensional array during a loop
	$LineItem = array();
	for ($i = 1; $i <= 2; $i++)
	{
		// The ID assigned to the item 
		$LineItem[$i]['itemId'] = '100'.$i; // Up to 31 characters
		// A short description of an item 
		$LineItem[$i]['name'] = 'books'.$i; // Up to 31 characters
		// A detailed description of an item 
		$LineItem[$i]['description'] = 'book sellers'.$i; // Up to 255 characters
		// The quantity of an item 
		$LineItem[$i]['quantity'] = '2'; // Up to 4 digits (up to two decimal places)
		// Cost of an item per unit excluding tax, freight, and duty 
		$LineItem[$i]['unitPrice'] = '7.00'; // Up to 4 digits with a decimal point (no dollar symbol)
		// Indicates whether the item is subject to tax
		$LineItem[$i]['taxable'] = '0'; // Standard Boolean logic, 0=FALSE and 1=TRUE
	}
	$cim->LineItems = $LineItem;
	
	// transactionType = (profileTransCaptureOnly, profileTransAuthCapture or profileTransAuthOnly)
	$cim->setParameter('transactionType', 'profileTransAuthOnly'); // see options above
	
	// Payment gateway assigned ID associated with the customer profile
	$cim->setParameter('customerProfileId', '3093161'); // Numeric (required)
	
	// Payment gateway assigned ID associated with the customer payment profile
	$cim->setParameter('customerPaymentProfileId', '2677904'); // Numeric (required)
	
	// Payment gateway assigned ID associated with the customer shipping address (optional)
	// If the customer AddressId is not passed, shipping information will not be included with the transaction.
	$cim->setParameter('customerShippingAddressId', '2752107'); // Numeric (optional)
	

	// Up to 20 characters (no symbols) (optional)
	$cim->setParameter('order_invoiceNumber', 'my order invoice id'); 
	// Up to 255 characters (no symbols) (optional)
	$cim->setParameter('order_description', 'my order description'); 
	// Up to 25 characters (no symbols) (optional)
	$cim->setParameter('order_purchaseOrderNumber', '1234'); 
	
	// The tax exempt status
	$cim->setParameter('transactionTaxExempt', 'false');
	
	// The recurring billing status
	$cim->setParameter('transactionRecurringBilling', 'true');
	
	// The customer's card code (the three- or four-digit number on the back or front of a credit card)
	// Required only when the merchant would like to use the Card Code Verification (CCV) filter
	$cim->setParameter('transactionCardCode', '123'); // (conditional)
	
	// The authorization code of an original transaction required for a Capture Only
	// This element is only required for the Capture Only transaction type.
	//$cim->setParameter('transactionApprovalCode', 'abc123'); // 6 characters only (conditional)
	
	$cim->createCustomerProfileTransactionRequest();

	

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
	echo "<br>".$cim->customerPaymentProfileId;*/
	echo "<br>".$cim->transactionID;
	var_dump($cim->response);
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