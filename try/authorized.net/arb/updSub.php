<?php
// Include AuthnetCIM class. Nothing works without it!
require('AuthnetARB.class.php');
 $subscription_id='1022961';
try{
    $subscription = new AuthnetARB('733N7TvPF2zx', '6bAy8253FK2fR55b');
	try{
		// Set subscription information
		
		$subscription->setParameter('subscriptionId', 1022961);
$subscription->setParameter('cardNumber', '4111111111111111');
$subscription->setParameter('expirationDate', '2016-11');
$subscription->setParameter('firstName', 'John');
$subscription->setParameter('lastName', 'Conde');
$subscription->setParameter('address', '123 Main Street');
$subscription->setParameter('city', 'Townsville');
$subscription->setParameter('state', 'NJ');
$subscription->setParameter('zip', '12345');
$subscription->setParameter('email', 'fakemail@example.com');
$subscription->updateAccount();
		var_dump($subscription);
		if ($subscription->isSuccessful()){
			// Get the subscription ID
			$subscription_id = $subscription->getSubscriberID();
			echo valid;
		}else{
			echo invalid;
			// The subscription was not created!
		}
		
	}catch (AuthnetARBException $e){
		echo $e;
		echo $subscription;
	}
}catch (AuthnetARBException $e){
    echo 'There was an error processing the transaction. Here is the error message: ';
    echo $e->__toString();
}
?>
