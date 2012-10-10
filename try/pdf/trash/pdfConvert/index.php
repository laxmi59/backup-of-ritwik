<?php
error_reporting (E_ALL|E_STRICT);
define ('USERNAME', 'ritwik');
define ('PASSWORD', 'test123');
define ('ENDPOINT', 'https://api.livedocx.com/1.2/mailmerge.asmx?WSDL');
date_default_timezone_set('Europe/Berlin'); 
$soap = new SoapClient(ENDPOINT);
$soap->LogIn( array(  'username' => USERNAME, 'password' => PASSWORD ));
if(isset($_REQUEST['Submit'] ) &&  $_REQUEST['Submit'] !='' ) {
	$docTitle=$_FILES['uploadFile']['name'];
	if($docTitle) 	{
		$originalpath='uploads/';
		$storePhotoIn=$originalpath.$docTitle;
		if(move_uploaded_file($_FILES['uploadFile']["tmp_name"],$storePhotoIn))		{	
		$data = file_get_contents($originalpath.$docTitle);
		$ext = pathinfo($originalpath.$docTitle, PATHINFO_EXTENSION);
		$soap->SetLocalTemplate( array('template' => base64_encode($data), 'format'   =>$ext ));
		$soap->CreateDocument();
		$result = $soap->RetrieveDocument(   array( 'format' => 'pdf'  ));
		$data = $result->RetrieveDocumentResult;
		$newFileName=str_replace(".".$ext,'',$docTitle);
		file_put_contents($originalpath.$newFileName.".pdf", base64_decode($data));
		$result = $soap->GetAllBitmaps(  array( 'zoomFactor' => 100, 'format'     => 'png'   ));
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
		 
		/*foreach ($data as $pageCounter => $pageData) {
		  //  $pageFilename = sprintf('./license-agreement-document-page1-%s.png', $pageCounter);
		   $pageFilename = sprintf($originalpath.$newFileName."-%s.png", $pageCounter);
			file_put_contents($pageFilename, $pageData);    
		}*/
	
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
		 
	/*	foreach ($data as $pageCounter => $pageData) {
			$pageFilename = sprintf($originalpath.$newFileName."-%s.wmf", $pageCounter);
			file_put_contents($pageFilename, $pageData);    
		}*/
		$soap->LogOut(); 
		unset($soap);
		unlink($originalpath.$docTitle);
		print($ext." File Converted to pdf." . PHP_EOL);
		}
	}
 }
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
<script language="javascript">
/*function validate()
{
	var formName=document.pdfConvert;
	if(formName.uploadFile.value=='')
	{
		alert("Plaese upload a file");
		return false;
	}
	else
	{
		var resVal=formName.uploadFile.value;
		var b=resVal.lastIndexOf('.',resVal.length);
		var c=resVal.substr(b+1,resVal.length);
		if( !(c!='docx'  || c!='doc' )  )
		{
			alert("Plaese upload file  in  .docx format");
			return false;
		}
	}
}*/
</script>
<form name="pdfConvert" id="pdfConvert"  action="" method="post" enctype="multipart/form-data" onsubmit="return validate();">
<input type="file" name="uploadFile" id="uploadFile"  />
<input type="submit" name="Submit" value="Convert"  />
</form>