<?php
 
// Turn up error reporting
error_reporting (E_ALL|E_STRICT);

 
// Turn off WSDL caching
ini_set ('soap.wsdl_cache_enabled', 0);
 
// Define credentials for LD
define ('USERNAME', 'ritwik');
define ('PASSWORD', 'test123');
 
// SOAP WSDL endpoint
define ('ENDPOINT', 'https://api.livedocx.com/1.2/mailmerge.asmx?WSDL');
 
// Define timezone
date_default_timezone_set('Europe/Berlin');
//
// SAMPLE #3 - Supported Formats
//
 
print('Starting sample #3 (supported-formats)...' . PHP_EOL);
 
// Instantiate SOAP object and log into LiveDocx
 
$soap = new SoapClient(ENDPOINT);
 
$soap->LogIn(
    array(
        'username' => USERNAME,
        'password' => PASSWORD
    )
);
 
// Get an object containing an array of supported template formats
 
$result = $soap->GetTemplateFormats();
 
print(PHP_EOL . 'Template format (input):' . PHP_EOL);
 
foreach ($result->GetTemplateFormatsResult->string as $format) {
    printf('- %s%s', $format, PHP_EOL);
}
 
// Get an object containing an array of supported document formats
 
print(PHP_EOL . 'Document format (output):' . PHP_EOL);
 
$result = $soap->GetDocumentFormats();
 
foreach ($result->GetDocumentFormatsResult->string as $format) {
    printf('- %s%s', $format, PHP_EOL);
}
 
// Get an object containing an array of supported image formats
 
print(PHP_EOL . 'Image format (output):' . PHP_EOL);
 
$result = $soap->GetImageFormats();
 
foreach ($result->GetImageFormatsResult->string as $format) {
    printf('- %s%s', $format, PHP_EOL);
}
 
print(PHP_EOL . 'DONE.' . PHP_EOL);
 
// Log out (closes connection to backend server)
 
$soap->LogOut();
 
unset($soap);
?>