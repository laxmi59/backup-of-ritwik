<?php 
function is_valid_credit_card($s) {
    $s = strrev(preg_replace('/[^\d]/','',$s));
    $sum = 0;
    for ($i = 0, $j = strlen($s); $i < $j; $i++) {
        if (($i % 2) == 0) {
            $val = $s[$i];
        } else {
            $val = $s[$i] * 2;
            if ($val > 9) { $val -= 9; }
        }
        $sum += $val;
    }
    return (($sum % 10) == 0);
}if (! is_valid_credit_card('676700000000000000')) {
    print 'Sorry, that card number is invalid.';
}else{
	print 'success';
}
?>