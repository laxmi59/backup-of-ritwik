<?php
function objectsIntoArray($arrObjData, $arrSkipIndices = array())
{
    $arrData = array();
    // if input is object, convert into array
    if (is_object($arrObjData)) {
        $arrObjData = get_object_vars($arrObjData);
    }
    if (is_array($arrObjData)) {
        foreach ($arrObjData as $index => $value) {
            if (is_object($value) || is_array($value)) {
                $value = objectsIntoArray($value, $arrSkipIndices); // recursive call
            }
            if (in_array($index, $arrSkipIndices)) {
                continue;
            }
            $arrData[$index] = $value;
        }
    }
    return $arrData;
}

if($_GET['act']=='test'){
	extract($_POST);
	$url="http://api2.citysearch.com/profile/?listing_id=".$listing_id."&client_ip=".$client_ip."&reference_id=".$reference_id."&publisher=".$publisher."&placement=".$placement."&api_key=".$api_key."&format=".$format;
	
	$xmlStr = file_get_contents($url);
	$xmlObj = simplexml_load_string($xmlStr);
	$arrXml = objectsIntoArray($xmlObj);
	echo "<pre>";
	print_r($arrXml);
	echo "</pre>";
	$Heading = $arrXml['location']['name'];
	$Sub_Heading = $arrXml['location']['teaser'];
	$Text_Content = $arrXml['location']['customer_content']['customer_message'];
	$Street_Address = $arrXml['location']['address']['street'];
	$City = $arrXml['location']['address']['city'];
	$State = $arrXml['location']['address']['state'];
	$Zipcode = $arrXml['location']['address']['postal_code'];
	$Phone_Number = $arrXml['location']['contact_info']['display_phone'];
	$Webite_URL = $arrXml['location']['contact_info']['display_url'];
	$Destination_URL = $arrXml['location']['urls']['profile_url'];
	$Save_for_Tracking_Pixel = $arrXml['location']['reference_id'];
	
	echo "<table width='100%'>
  <tr><td width='25%'>Heading</td><td width='75%'>$Heading</td></tr>
  <tr><td>Sub Heading</td><td>$Sub_Heading</td></tr>
  <tr><td>Text Content</td><td>$Text_Content</td></tr> 
  <tr><td>Street Address</td><td>$Street_Address</td></tr>
  <tr><td>City</td><td>$City</td></tr>
  <tr><td>State</td><td>$State</td></tr>
  <tr><td>Zipcode</td><td>$Zipcode</td></tr>
  <tr><td>Phone Number</td><td>$Phone_Number</td></tr>
  <tr><td>Webite URL</td><td>$Webite_URL</td></tr>
  <tr><td>Destination URL</td><td>$Destination_URL</td></tr>
  <tr><td>Save for Tracking Pixel</td><td>$Save_for_Tracking_Pixel</td></tr>
</table><a href='$Destination_URL?action_target=listing_profile&listing_id=$listing_id&client_ip=$client_ip&reference_id=$reference_id&publisher=$publisher&placement=$placement&api_key=$api_key&format=$format'><img src='http://clients.adtingo.com/Campaign_templates/Campaign_template1/images/content-buttoncheckitout.jpg' border=0/></a>";
	
}
?>
<a href="http://sanantonio.citysearch.com/review/10100230?listing_id=$listing_id&client_ip=$client_ip&reference_id=$reference_id&publisher=$publisher&placement=$placement&api_key=$api_key&format=$format"></a>

