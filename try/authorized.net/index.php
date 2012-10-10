<?php
require_once 'anet_php_sdk/AuthorizeNet.php'; // The SDK
$url = "http://192.168.1.88/rama/try/index.php";
$api_login_id = '733N7TvPF2zx';
$transaction_key = '6bAy8253FK2fR55b';
$md5_setting = '733N7TvPF2zx'; // Your MD5 Setting
$amount = "5.99";
AuthorizeNetDPM::directPostDemo($url, $api_login_id, $transaction_key, $amount, $md5_setting);
?>