 <?php
    require_once 'AuthorizeNet.php';
    define("AUTHORIZENET_API_LOGIN_ID", "733N7TvPF2zx");
    define("AUTHORIZENET_TRANSACTION_KEY", "6bAy8253FK2fR55b");
    $request = new AuthorizeNetCIM;
    // Create new customer profile
    $customerProfile                    = new AuthorizeNetCustomer;
    $customerProfile->description       = "Description of customer";
	$customerProfile->firstName       = "test";
    $customerProfile->merchantCustomerId= time();
    $customerProfile->email             = "test@domain.com";
	
	 // Add payment profile.
	 
	 
    $paymentProfile = new AuthorizeNetPaymentProfile;
    $paymentProfile->customerType = "individual";
    $paymentProfile->payment->creditCard->cardNumber = "4111111111111111";
    $paymentProfile->payment->creditCard->expirationDate = "2017-04";
    $customerProfile->paymentProfiles[] = $paymentProfile;
	
    $response = $request->createCustomerProfile($customerProfile);
    if ($response->isOk()) {
        $customerProfileId = $response->getCustomerProfileId();
		echo $customerProfileId;
    }else{
		echo "<br><pre>";
	print_r($response);
	echo "</pre>";
	}
    ?>