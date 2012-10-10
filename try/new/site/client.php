<?php /*?><?php
require_once('nusoap.php'); 
$wsdl="http://localhost/rama/try/new/lib/server.php?wsdl";
$client=new nusoap_client($wsdl);
$param=array('int1'=>'15.00', 'int2'=>'10'); 
print_r($client->call('add', $param));
//$class_methods = get_class_methods($client);
////foreach ($class_methods as $method_name) {
//    echo "$method_name<br>";
//}
//$param=array('username'=>'soap@conglomeratenetwork.com', 'password'=>'Password2');
//$test=$client->authentication('authentication',$param);
////$param1=array('Email'=>'shekar@ritwik.com');
//$test1=$client->getRecipientByAddress('address',$param1);
?><?php */?>
<?php
require_once('nusoap.php'); 

$wsdl="http://api.stormpost.datranmedia.com/services/SoapRequestProcessor?wsdl";
$client=new nusoap_client($wsdl,true);
$auth_array = array('soap@conglomeratenetwork.com','Password2');
$login_results = $client->call('authentication',$auth_array);
print_r($client->call('getRecipientByAddress','shekar@ritwik.com'));

echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
//echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';

?>
