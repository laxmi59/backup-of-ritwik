<?php
function do_reg($text)
{
	$regex="/^([34|37]{2})([0-9]{10,15})$/";
	if (preg_match($regex, $text)) {
		echo "match";
	} 
	else {
		echo "not match";
	}
}

echo do_reg("3700000000000004");
?>