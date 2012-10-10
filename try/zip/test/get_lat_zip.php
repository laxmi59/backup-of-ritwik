<?
//function GetLatLong($postcode){
 /* $myKey = "BQIAAAAAQGCqv0G3MkywFdNLX401BS3hzBAhS_pUz7NmsHRqwe4NVj14RRehSxM2ZkbrGUrFuhg65K12AL-ag";
  $URL = "http://maps.google.co.uk/maps/geo?q=" . urlencode(1111) . "&output=json&key=".$myKey;

  $data = file($URL);
  if($data){
    $data = json_decode($data[0]);

    $long = $data->Placemark[0]->Point->coordinates[0];
    $lat = $data->Placemark[0]->Point->coordinates[1];

    $arr= array('Latitude'=>$lat,'Longitude'=>$long);
	print_r($arr);

  }else return false;*/
  
  

//}
?>
<?php /*?><script type="text/javascript">
var map = null;
var geocoder = null;
function load() 
{
	if (GBrowserIsCompatible()) {
	map = new GMap2(document.getElementById("map"));
	geocoder = new GClientGeocoder();
	}
	
}
function lat_lng()
{
	var test=document.pgenerate.test.value;
	alert (test);
	showAddress(test);
}
function showAddress(address) 
{
alert(address);
	if (geocoder) {
	geocoder.getLatLng(address,
		function(point) {
		if (!point) {
alert(address + " not found");
} else {
var msg = "Latitude: "+point.lat()+"<br>"+"Longitude: "+point.lng();
alert(msg);
document.pgenerate.main1.value=point.lat();
document.pgenerate.main2.value=point.lng();
}
}
);
}
}

</script>
<form method="post" name="pgenerate">
<input type="text" name="test" id="test" value="1111">
<input type="text" name="main1" id="main1" >
<input type="text" name="main2" id="main2" >
<input type="button" name="submit" value="submit" onClick="return lat_lng()">
</form><?php */?>
<?
// Uses PHP to query a website which gets latitude and longitude info from Google Maps Geocode; without needed an API code
$zip = 94043; // your input zipcode; but if you want to do an entire address, get the possible inputs from the queried website 

$site = file_get_contents('http://geocoder.ca/?postal='.$zip, false, NULL, 1000, 1000); // get a large chunk of the output string that will contain the coordinates
$goods = strstr($site, 'GPoint('); // cut off the first part up until the coordinates are provided
$end = strpos($goods, ')'); // the ending parenthesis of the coordinate string
$cords = substr($goods, 7, $end - 7); // returns string with only the coordinates as 'latitude, longitude' (can stop here if string wanted)
$array = explode(', ',$cords); // convert string into array(0 => $latitude, 1 => $longitude)
print_r($array); // output the array to verify

?>