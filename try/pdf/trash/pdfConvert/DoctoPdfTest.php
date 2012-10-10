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
 
// -----------------------------------------------------------------------------
 
//
// SAMPLE #1 - License Agreement
//
 
print('Starting sample #1 (Resume2)...');
 
// Instantiate SOAP object and log into LiveDocx
 
$soap = new SoapClient(ENDPOINT);

$soap->LogIn(
    array(
        'username' => USERNAME,
        'password' => PASSWORD
    )
);
// Upload template
 
$data = file_get_contents('./doc1.doc');
 
$soap->SetLocalTemplate(
    array(
        'template' => base64_encode($data),
        'format'   => 'docx'
    )
);
 
// Assign data to template
 
/*$fieldValues = array (
    'software' => 'Magic Graphical Compression Suite v2.5',
    'licensee' => 'Henry Döner-Meyer',
    'company'  => 'Megasoft Co-Operation',
    'date'     => date('F d, Y'),
    'time'     => date('H:i:s'),
    'city'     => 'Berlin',
    'country'  => 'Germany'
);
 
$soap->SetFieldValues(
    array (
        'fieldValues' => assocArrayToArrayOfArrayOfString($fieldValues)
    )
);*/
 
// Build the document
 
$soap->CreateDocument();
 
// Get document as PDF
 
$result = $soap->RetrieveDocument(
    array(
        'format' => 'pdf'
    )
);
 
$data = $result->RetrieveDocumentResult;
 
file_put_contents('./doc1.pdf', base64_decode($data));
 
// Get document as bitmaps (one per page)
 
$result = $soap->GetAllBitmaps(
    array(
        'zoomFactor' => 100,
        'format'     => 'png'
    )
);
 
$data = array();
 
if (isset($result->GetAllBitmapsResult->string)) {
    $pageCounter = 1;
    if (is_array($result->GetAllBitmapsResult->string)) {
        foreach ($result->GetAllBitmapsResult->string as $string) {
            $data[$pageCounter] = base64_decode($string);
            $pageCounter++;
        }
    } else {
       $data[$pageCounter] = base64_decode($result->GetAllBitmapsResult->string);
    }
}
 
foreach ($data as $pageCounter => $pageData) {
  //  $pageFilename = sprintf('./license-agreement-document-page1-%s.png', $pageCounter);
   $pageFilename = sprintf('./doc1-%s.png', $pageCounter);
    file_put_contents($pageFilename, $pageData);    
}
 
// Get document as Windows metafiles (one per page)
 
$result = $soap->GetAllMetafiles();
 
$data = array();
 
if (isset($result->GetAllMetafilesResult->string)) {
    $pageCounter = 1;
    if (is_array($result->GetAllMetafilesResult->string)) {
        foreach ($result->GetAllMetafilesResult->string as $string) {
            $data[$pageCounter] = base64_decode($string);
            $pageCounter++;
        }
    } else {
       $data[$pageCounter] = base64_decode($result->GetAllMetafilesResult->string);
    }
}
 
foreach ($data as $pageCounter => $pageData) {
    $pageFilename = sprintf('./doc1-%s.wmf', $pageCounter);
    file_put_contents($pageFilename, $pageData);    
}
 
// Log out (closes connection to backend server)
 
$soap->LogOut();
 
unset($soap);
 
print('DONE.' . PHP_EOL);
 
// -----------------------------------------------------------------------------
 
 
// -----------------------------------------------------------------------------
 
/**
 * Convert a PHP assoc array to a SOAP array of array of string
 *
 * @param array $assoc
 * @return array
 */
function assocArrayToArrayOfArrayOfString ($assoc)
{
    $arrayKeys   = array_keys($assoc);
    $arrayValues = array_values($assoc);
 
    return array ($arrayKeys, $arrayValues);
}
 
/**
 * Convert a PHP multi-depth assoc array to a SOAP array of array of array of string
 *
 * @param array $multi
 * @return array
 */
function multiAssocArrayToArrayOfArrayOfString ($multi)
{

    $arrayKeys   = array_keys($multi[0]);
    $arrayValues = array();
 
    foreach ($multi as $v) {
        $arrayValues[] = array_values($v);
    }
 
    $_arrayKeys = array();
    $_arrayKeys[0] = $arrayKeys;
 
    return array_merge($_arrayKeys, $arrayValues);
}
?>