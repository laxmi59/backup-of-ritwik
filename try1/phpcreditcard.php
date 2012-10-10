<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PHP Credid Card Validation Script Form</title>
<meta name="description" content="a php script showing a tutorial how to create a script about credit card validation with a form">
<meta name="keywords" content="php, credit, card, validator, validation, script, class">
</head>
<body>
<?php
 
function validateCC($ccnum){
// Clean up input
$ccnum = ereg_replace('[-[:space:]]', '',$ccnum);

// What kind of card do we have
$type = check_type($ccnum);
// Does the number matchup ?
$valid = check_number($ccnum);
return array($type, $valid);
}

// Prefix and Length checks
function check_type( $cardnumber ) {
$cardtype = "UNKNOWN";
$len = strlen($cardnumber);
/*if ( $len == 15 && substr($cardnumber, 0, 1) == '3' ) { $cardtype = "amex"; }
elseif ( $len == 16 && substr($cardnumber, 0, 4) == '6011' ) { $cardtype = "discover"; }
elseif ( $len == 16 && substr($cardnumber, 0, 1) == '5' ) { $cardtype = "mc"; }
elseif ( ($len == 16 || $len == 13) && substr($cardnumber, 0, 1) == '4' ) { $cardtype = "visa"; }
return ( $cardtype );
}*/
if ( $len == 15 && (substr($cardnumber, 0, 2) == '37' || substr($cardnumber, 0, 2) == '34' ) ) { $cardtype = "amex"; }
elseif ( $len == 16 && substr($cardnumber, 0, 4) == '6011' ) { $cardtype = "discover"; }
elseif ( $len == 16 && substr($cardnumber, 0, 1) == '5' ) { $cardtype = "mc"; }
elseif ( ($len == 16 || $len == 13) && substr($cardnumber, 0, 1) == '4' ) { $cardtype = "visa"; }
//elseif ( $len == 16 && (substr($cardnumber, 0, 2) == '51' || substr($cardnumber, 0, 2) == '52' substr($cardnumber, 0, 2) == '53' substr($cardnumber, 0, 2) == '54' substr($cardnumber, 0, 2) == '55') ) { $cardtype = "MasterCard"; }
return ( $cardtype );
}

// MOD 10 checks
function check_number( $cardnumber ) {
$dig = toCharArray($cardnumber);
$numdig = sizeof ($dig);
$j = 0;
for ($i=($numdig-2); $i>=0; $i-=2){
$dbl[$j] = $dig[$i] * 2;
$j++;
}
$dblsz = sizeof($dbl);
$validate =0;
for ($i=0;$i<$dblsz;$i++){
$add = toCharArray($dbl[$i]);
for ($j=0;$j<sizeof($add);$j++){
$validate += $add[$j];
}
$add = '';
}
for ($i=($numdig-1); $i>=0; $i-=2){
$validate += $dig[$i];
}
if (substr($validate, -1, 1) == '0') { return 1; }
else { return 0; }
}

// takes a string and returns an array of characters
function toCharArray($input){
$len = strlen($input);
for ($j=0;$j<$len;$j++){
$char[$j] = substr($input, $j, 1);
}
return ($char);
}

$ccnumber = $_POST['ccnumber'];
list($type, $valid) = validateCC($ccnumber);
if ( $valid ) {
// Do something fun with the card
echo "Number: <b>$ccnumber</b> ... Type: <b>$type</b> ... Valid: <b>$valid</b>";
}
else {
// Return some sort of error
echo "INVALID: Number: <b>$ccnumber</b> ... Type: <b>$type</b> ... Valid: <b>$valid</b>";
}
?>
<h1>PHP Credid Card Validation Script Form </h1>
<hr>
<form action='' method="post">
Card Number: <input name='ccnumber' />
<input type='submit' />
</form>
<?
echo $delivery_date=date('Y-m-d H:i:s',time());
?>
<table style="font-family: courier; margin-left: 20px; line-height: 0.9em;">
<tr><td style="padding-right: 30px;">American Express</td><td>340000000000009</td></tr>
<tr><td>Carte Blanche</td><td>3000 0000 0000 04</td></tr>
<tr><td>Discover</td><td>6011000000000004</td></tr>
<tr><td>Diner's Club</td><td>3000 0000 0000 04</td></tr>
<tr><td>enRoute</td><td>2014 0000 0000 009</td></tr>
<tr><td>JCB</td><td>2131 0000 0000 0008</td></tr>
<tr><td>MasterCard</td><td>5500000000000004</td></tr>
<tr><td>Solo</td><td>6334000000000004</td></tr>
<tr><td>Switch</td><td>4903 0100 0000 0009</td></tr>
<tr><td>Visa</td><td>4111 1111 1111 1111</td></tr>
</table>
<div align="center">
<p>&nbsp;</p>
<p><a href="http://www.webune.com">Tutorial hosing by webune.com</a> </p>
</div>
</body>
</html>


