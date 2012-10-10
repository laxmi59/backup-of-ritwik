<?php

	

   set_error_handler('errorHandler');

   

   function errorHandler ($errno, $errstr, $errfile, $errline, $errcontext)

{

	//suppress all errors

}

   if ($_POST['address'] != "") {

   		doGeo(urlencode($_POST['address']));

   		}

   

   function doGeo($marker) {

   // Your Google Maps API key

   $key = "Your key here";

   // Desired address

   $address = "http://maps.google.com/maps/geo?q=$marker&output=xml&key=$key";

   // Retrieve the URL contents

   $page = file_get_contents($address);

   // Parse the returned XML file

   $xml = new SimpleXMLElement($page);

// Retrieve the desired XML node

//   echo $xml->Response->Placemark->Point->coordinates;

   // Parse the coordinate string

   list($longitude, $latitude, $altitude) = explode(",", 

        $xml->Response->Placemark->Point->coordinates);

   

   // Output the coordinates

	echo "<p>".urldecode($marker)."</p>

	<p>Longitude: $longitude, Latitude: $latitude</p>";

}

?>
<form method="post">
<input type="text" name="address">
<input type="submit" name="submit">
</form>