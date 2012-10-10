<?
extract ($_POST);
/////////////////////////////// code for google request for lat/long ///////////////////// d
include "latitude_log.php";
$obj_google=new googleRequest;
//Here Addess Comes   
$obj_google->zip=$zip;
$obj_google->country=$country;
//echo $city."<br>".$address;
$obj_google->city=$event_place;
$obj_google->address=$event_address;
// End Of address

// for localhost
$obj_google->gKey="ABQIAAAAuh_J9j5CMtOIHaYAI1gg-RQ6UsSfU2wn4lla4ek4GDC_ucJ10hQVZzAP1LIPBYWHAq9JpfAt4RvXog"; 
// for server
//$obj_google->gKey="ABQIAAAAuh_J9j5CMtOIHaYAI1gg-RTLrDuDzKFXhYoCZ55-iHqbARlVnBRIZX6t_vxyPm3j8Q6GdES9a5FDuw"; 

$latlng=$obj_google->GetRequest(); 
// o/p - >  $latlng It comes in array
print_r($latlng);
$latlogval = $latlng;
$lat = $latlogval[0];
$long = $latlogval[1];

//pri
?>
<form method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>zip</td>
    <td>:</td>
    <td><input name="zip" type="text"></td>
  </tr>
  <tr>
    <td>address</td>
    <td>:</td>
    <td><input name="event_address" type="text"></td>
  </tr>
  <tr>
    <td>city</td>
    <td>:</td>
    <td><input name="event_place" type="text"></td>
  </tr>
  <tr>
    <td>country</td>
    <td>:</td>
    <td><input name="country" type="text"></td>
  </tr>
  <tr>
    <td colspan="3"><input type="submit" name="submit" value="submit"></td>
  </tr>
</table>
</form>