<?php
// Include AuthnetCIM class. Nothing works without it!
require('AuthnetARB.class.php');
 
try{
    $subscription = new AuthnetARB('733N7TvPF2zx', '6bAy8253FK2fR55b', AuthnetARB::USE_DEVELOPMENT_SERVER);
	try{
		// Set subscription information
		$subscription->setParameter('name', 'Subscription1');
		$subscription->setParameter('amount', 30.00);
		$subscription->setParameter('cardNumber', '6011000000000012');
		$subscription->setParameter('expirationDate', '2017-01');
		$subscription->setParameter('firstName', 'John1');
		$subscription->setParameter('lastName', 'Conde');
		$subscription->setParameter('address', '123 Main Street');
		$subscription->setParameter('city', 'Townsville');
		$subscription->setParameter('state', 'NJ');
		$subscription->setParameter('zip', '12345');
		$subscription->setParameter('email', 'rama@ritwik.com');
	 
		// Set the billing cycle for every three months
		$subscription->setParameter('interval_length', 1);
		$subscription->setParameter('unit', 'months');
		$subscription->setParameter('startDate', date("Y-m-d", strtotime("+ 1 months")));
		$subscription->setParameter('totalOccurrences', '3');
		// Create the subscription
		$subscription->createAccount();
		//$response = send_request_via_curl($host,$path,$content);
		var_dump($subscription);
		// Check the results of our API call
		if ($subscription->isSuccessful()){
			// Get the subscription ID
			echo $subscription->isSuccessful();
			$subscription_id = $subscription->getSubscriberID();
			echo $subscription_id;
		}else{
			//echo invalid;
			echo $subscription->isSuccessful();
			// The subscription was not created!
		}
		echo "<br>".$subscription->isSuccessful();
	}catch (AuthnetARBException $e){
		echo $e;
		echo $subscription;
	}
}catch (AuthnetARBException $e){
    echo 'There was an error processing the transaction. Here is the error message: ';
    echo $e->__toString();
}
?>
