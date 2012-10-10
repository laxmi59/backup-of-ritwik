<!--
//////////////////////////////////////////////////////////////////////////////////
//
//  This source code is only licensed to our premium subscribers. It is provided "as is" and without warranties.
//
//  http://www.fraudlabs.com © All Rights Reserved 2008
///
/////////////////////////////////////////////////////////////////////////////////
-->

<?php
require_once('lib/nusoap.php');
$soapclient  = new soapclient_nusoap('http://api.stormpost.datranmedia.com/services/SoapRequestProcessor?wsdl','wsdl');

$auth_array = array(
     'username' => 'soap@conglomeratenetwork.com',
     'password' => 'Password2'
);
$result = $soapclient->call('authentication', $auth_array);

print_r($soapclient->call('getRecipientByAddress','shekar@ritwik.com'));
echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient->response, ENT_QUOTES) . '</pre>';
?>

