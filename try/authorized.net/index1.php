<?php
require_once 'anet_php_sdk/AuthorizeNet.php'; // Include the SDK you downloaded in Step 2
$api_login_id = '733N7TvPF2zx';
$transaction_key = '6bAy8253FK2fR55b';
$amount = "5.99";
$fp_timestamp = time();
$fp_sequence = "123" . time(); // Enter an invoice or other unique number.
$fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id,
  $transaction_key, $amount, $fp_sequence, $fp_timestamp)
?>

<form method='post' action="https://test.authorize.net/gateway/transact.dll">
<input type='hidden' name="x_login" value="<?php echo $api_login_id?>" />
<input type='hidden' name="x_fp_hash" value="<?php echo $fingerprint?>" />
<input type='hidden' name="x_amount" value="<?php echo $amount?>" />
<input type='hidden' name="x_fp_timestamp" value="<?php echo $fp_timestamp?>" />
<input type='hidden' name="x_fp_sequence" value="<?php echo $fp_sequence?>" />
<input type='hidden' name="x_version" value="3.1">
<input type='hidden' name="x_show_form" value="payment_form">
<input type='hidden' name="x_test_request" value="false" />
<input type='hidden' name="x_method" value="cc">
<input type="hidden" name="x_interval" value="1">
<input type="hidden" name="x_length" value="3">
<input type="hidden" name="x_unit" value="months">
<input type="hidden" name="x_startDate" value="<? echo date("Y-m-d", strtotime("+ 1 months"))?>">

<input type='submit' value="Click here for the secure payment form">
</form>