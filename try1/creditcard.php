<?php
function validateCC($cc_num, $type) {

	if($type == "AmEx") {
	$denum = "American Express";
	} elseif($type == "Discover") {
	$denum = "Discover";
	} elseif($type == "MasterCard") {
	$denum = "MasterCard";
	} elseif($type == "Visa") {
	$denum = "Visa";
	} elseif($type == "Maestro") {
	$denum = "Maestro";
	}elseif($type == "Solo") {
	$denum = "Solo";
	}

	if($type == "AmEx") {
	$pattern = "/^([34|37]{2})([0-9]{15})$/";//American Express
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	
	} elseif($type == "Discover") {
	$pattern = "/^([6011|622]{4})([0-9]{12})$/";//Discover Card
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	
	} elseif($type == "MasterCard") {
	$pattern = "/^([51|52|53|54|55]{2})([0-9]{16})$/";//Mastercard
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	
	} elseif($type == "Visa") {
	$pattern = "/^([4]{1})([0-9]{12,15})$/";//Visa
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
	
	}elseif($type == "Solo"){
	$pattern = "/^([6334|6767]{4})([0-9]{16,18,19})$/";//Solo
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
    }elseif($type == "Maestro"){
	$pattern = "/^([5018|5020|5038|6304|6759|6761]{4})([0-9]{12,13,14,15,16,18,19})$/";//Maestro
	if (preg_match($pattern,$cc_num)) {
	$verified = true;
	} else {
	$verified = false;
	}
    }
	
	if($verified == false) {
	//Do something here in case the validation fails
	echo "Credit card invalid. Please make sure that you entered a valid <em>" . $denum . "</em> credit card ";
	
	} else { //if it will pass...do something
	echo "Your <em>" . $denum . "</em> credit card is valid";
	}


}
echo validateCC("62
11000000000004", "Discover");
?>