<?php
require_once('nusoap.php'); 
$wsdl="http://localhost/rama/try/new/lib/server.php?wsdl";
$client=new nusoap_client($wsdl);
$param=array('int1'=>'15.00', 'int2'=>'10'); 
print_r($client->call('add', $param));
?>