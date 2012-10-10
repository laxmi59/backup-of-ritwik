<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Find the latitude and longitude for any address</title>


  <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAR_F-TPVKyKZtTeE2JqDOyxSkub0_1-W_YbWegRUisOQT0mZrZxRsRlb-JuOnmG4ag_lNfo2hh7x1Mg" type="text/javascript"></script>
  <script type="text/javascript">
//<![CDATA[
var map = null;
var geocoder = null;
function load() {
if (GBrowserIsCompatible()) {
map = new GMap2(document.getElementById("map"));
map.addControl(new GSmallMapControl());
map.addControl(new GMapTypeControl());
map.setCenter(new GLatLng(51.90, 4.46), 13);
geocoder = new GClientGeocoder();
}
}
function showAddress(address) 
{
if (geocoder) {
geocoder.getLatLng(
address,
function(point) {
if (!point) {
alert(address + " not found");
} else {
//map.setCenter(point, 13);
var msg = "Latitude: "+point.lat()+"<br>"+"Longitude: "+point.lng();
document.getElementById("mypoint").innerHTML = msg; var marker = new GMarker(point);
map.addOverlay(marker);
marker.openInfoWindowHtml(msg);
}
}
);
}
}
//]]>
  </script>

  <meta content="rubenb" name="author">

  <meta content="Find the latitude and longitude for any address or location in the world" name="description">

</head>


<body onLoad="load()" onUnload="GUnload()" style="color: rgb(0, 0, 0); background-color: rgb(51, 51, 51);" alink="#000099" link="#000099" vlink="#990099">

<form action="#" onSubmit="showAddress(this.address.value); return false">
  <div style="text-align: center;"> </div>

  <p style="text-align: center;"></p>

  <table style="font-family: Arial Narrow; width: 756px; height: 490px; text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">

    <tbody>

      <tr>

        <td>
        <p><input size="60" name="address" value="riebeekstraat 6, rotterdam, netherlands" type="text"><input value="Go!" type="submit"></p>

        <div id="mypoint" style="font-size: 12pt; color: rgb(255, 255, 255);">Latitude:<br>

Longitude:<br>

        </div>

        <div id="map" style="width: 500px; height: 400px; "></div>

        </td>

      
      </tr>

     

    </tbody>

  </table>

</form>

</body>
</html>
