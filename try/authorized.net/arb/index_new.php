<?php
// Include AuthnetCIM class. Nothing works without it!
require('AuthnetARB.class.php');
extract($_POST);
 /*$amount='30.00';
 $firstName='jhon';
 $lastName='dio';
 $email ='rama@ritwik.com';
 $carnum='4007000000027';
 $expd='2019-01';
 $address ='123 Main Street';
 $city='Townsville';
 $state ='NJ';
 $zip='12345';
 $interval_length='1';
 $timespan='3';
 $stdate=date("Y-m-d", strtotime("+ 1 months"));
 $totocc='3';*/
try{
    $subscription = new AuthnetARB('733N7TvPF2zx', '6bAy8253FK2fR55b', AuthnetARB::USE_DEVELOPMENT_SERVER);

		// Set subscription information
		$subscription->setParameter('name', 'Subscription1');
		$subscription->setParameter('amount', $amount);
		$subscription->setParameter('cardNumber', $carnum);
		$subscription->setParameter('expirationDate',$expd );
		$subscription->setParameter('firstName', $firstName);
		$subscription->setParameter('lastName', $lastName);
		$subscription->setParameter('address', $address);
		$subscription->setParameter('city', $city);
		$subscription->setParameter('state', $state);
		$subscription->setParameter('zip', $zip);
		$subscription->setParameter('email', $email);
	 
		// Set the billing cycle for every three months
		$subscription->setParameter('interval_length', $interval_length);
		$subscription->setParameter('unit', $timespan);
		$subscription->setParameter('startDate', $stdate);
		$subscription->setParameter('totalOccurrences', $totocc);
		$subscription->createAccount();
		/*echo "<pre>";
		print_r($subscription);
		echo "</pre>";*/
		$subscription->isSuccessful();
		$subscription_id = $subscription->getSubscriberID();
		//echo $subscription->code;
		//exit;
	?>
	<form name="frm" id="frm" action="silent-post.php" method="post">
    <input type="hidden" name="x_response_code" value="<? echo $subscription->success;?>"/>
    <input type="hidden" name="x_response_subcode" value="1"/>
    <input type="hidden" name="x_response_reason_code" value="<? echo $subscription->code;?>"/>
    <input type="hidden" name="x_response_reason_text" value="<? echo $subscription->text;?>"/>
    <input type="hidden" name="x_amount" value="<? echo $amount;?>"/>
    <input type="hidden" name="x_method" value="CC"/>
    <input type="hidden" name="x_type" value="auth_capture"/>
    <input type="hidden" name="x_cust_id" value="<? echo $subscription_id;?>"/>
    <input type="hidden" name="x_first_name" value="<? echo $firstName?>"/>
    <input type="hidden" name="x_last_name" value="<? echo $lastName?>"/>
    <input type="hidden" name="x_ship_to_first_name" value="<? echo $firstName?>"/>
    <input type="hidden" name="x_ship_to_last_name" value="<? echo $lastName?>"/>
    <input type="hidden" name="x_tax" value="0.0000"/>
    <input type="hidden" name="x_duty" value="0.0000"/>
    <input type="hidden" name="x_freight" value="0.0000"/>
    <input type="hidden" name="x_tax_exempt" value="FALSE"/>
    <input type="hidden" name="x_po_num" value=""/>
    <input type="hidden" name="x_MD5_Hash" value="A375D35004547A91EE3B7AFA40B1E727"/>
    <input type="hidden" name="x_cavv_response" value=""/>
    <input type="hidden" name="x_test_request" value="false"/>
    <input type="hidden" name="x_subscription_id" value="<? echo $subscription->subscrId;?>"/>
    <input type="hidden" name="x_subscription_paynum" value="1"/>
    <input type="submit" value="" style="background:none; border:none"/>
</form><? echo "<script>document.frm.submit();</script>";
}catch (AuthnetARBException $e){
    echo 'There was an error processing the transaction. Here is the error message: ';
    echo $e->__toString();
}
?>
