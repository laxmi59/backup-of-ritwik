<?php
/* In this variable you can write what account type to add. If 'choose', the form will let you choose the account type.
Valid choices = reseller/client/extension/choose */
$account_type = 'choose';

/* If you add a reseller you need this variable setup with the admin_id */
$admin_id = '';

/* If you add a client you need this variable setup with the reseller_id */
$reseller_id = '';

/* If you add an extension you need this variable setup with the client_id */
$client_id = '';

/* The template ID. Make sure that the template type matches the type of the object you try to add! */
$template_id = '';

/* Billing plan ID. Set the ID only if you want to overwrite the template billing plan or the template does not have a billing plan asociated */
$billing_plan_id = '';

/* VoipNow server IP (where you want to add accounts) */
$voipnow_ip = '';

/* VoipNow schema version */
$voipnow_version = '1.2';

/* Username to connect to server */
$voipnow_username = 'admin';

/* Password for the $voipnow_username */
$voipnow_password = '';
?>
