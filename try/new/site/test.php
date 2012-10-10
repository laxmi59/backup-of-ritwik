<?
require_once('nusoap.php');
$wsdlURL = 'http://api.stormpost.datranmedia.com/services/SoapRequestProcessor?wsdl';
$soap=new nusoap_client($wsdlURL,true);
///////////////////////////                important ///////////////////////////
$class_methods = get_class_methods($soap);
foreach ($class_methods as $method_name) {
   echo "$method_name<br>";
}
//////////////////////////////////////////////////////////////////////////////////
//$soap = new soapclient($wsdlURL, true);
//
//

$username = 'soap@conglomeratenetwork.com';
$password = 'Password2';

// adds authentication to a SOAP client
// returns true if the authentication was successful
function addAuthentication($soap, $username, $password)
{
    // username and password are added in an AuthHeader
    $tt=$soap->setHeaders("<AuthHeader>
                           <UserName>$username</UserName>
                           <Password>$password</Password>
                       </AuthHeader>");

    // we check if the authentication was successful
    $result = $soap->call($tt);
    if ($error = $soap->getError()) die($error);
    return ($result["IsAuthenticatedResult"] == 'true');
}
addAuthentication($soap, $username, $password);
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
?>