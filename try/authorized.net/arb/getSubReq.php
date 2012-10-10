<?php
// Include AuthnetCIM class. Nothing works without it!
require('AuthnetARB.class.php');
 
try{
    $subscription = new AuthnetARB('733N7TvPF2zx', '6bAy8253FK2fR55b', AuthnetARB::USE_DEVELOPMENT_SERVER);
	try{
	
	/*$class_methods = get_class_methods('AuthnetARB');
foreach ($class_methods as $method_name) {
    echo "$method_name\n";
}*/
		// Set subscription information
		$subscription->setParameter('subscriptionID', '1022961');
		$subscription->getResponseCode();
		//echo $subscription_id = $subscription->getSubscriberID();
		//echo $subscription_name = $subscription->getSubscriberName();
		//var_dump($subscription);
		echo "<pre>";
		print_r($subscription);
		echo "</pre>";
		
	}catch (AuthnetARBException $e){
		echo $e;
		echo $subscription;
	}
}catch (AuthnetARBException $e){
    echo 'There was an error processing the transaction. Here is the error message: ';
    echo $e->__toString();
}
?>
