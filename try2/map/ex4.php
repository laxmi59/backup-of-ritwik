<?
$url =  "http://local.yahooapis.com/MapsService/V1/geocode";
	$args = "?appid=your_key_";
	$args .= "&street=" . urlencode(street_address);  //We must urlencode variables that will have spaces/etc
	$args .= "&city=" . urlencode(city);
	$args .= "&state=" . state;
	$args .= "&output=php";  //Optional parameter to return a php object
	$url = $url . $args;
curl_setopt($ch, CURLOPT_TIMEOUT, 5000);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$address_data = unserialize(curl_exec($ch));
	curl_close($ch);
$latitude = $address_data['ResultSet']['Result']['Latitude'];
	$longitude = $address_data['ResultSet']['Result']['Longitude'];
?>