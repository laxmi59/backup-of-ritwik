<?
if($_POST['submit'])
{
	extract($_POST);
	print_r($_POST);
}
?>
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
function load() 
{
	if (GBrowserIsCompatible()) {
	map = new GMap2(document.getElementById("map"));
	map.addControl(new GSmallMapControl());
	map.addControl(new GMapTypeControl());
	map.setCenter(new GLatLng(51.90, 4.46), 13);
	geocoder = new GClientGeocoder();
	}
	
}
function abcd()
{
	a=document.frm.address1.value;
	b=document.frm.address2.value;
	c=document.frm.address3.value;
	//alert(a);
	showAddress(a,b,c);
}
function showAddress(address) 
{
//alert('aa');
	if (geocoder) {
	geocoder.getLatLng(address,
		function(point) {
		if (!point) {
alert(address + " not found");
} else {
map.setCenter(point, 13);
//alert('aa');
var msg = "Latitude: "+point.lat()+"<br>"+"Longitude: "+point.lng();
map.addOverlay(marker);
marker.openInfoWindowHtml(msg);
document.frm.lat.value=point.lat();
document.frm.lng.value=point.lng();

}
}
);
}
}
//]]>
</script>
</head><!--onSubmit="showAddress(this.address1.value,this.address2.value,this.address3.value); return false;"-->
<body onLoad="load()" onUnload="GUnload()" >
<form method="post" name="frm" >
<input name="address1" type="text" onKeyUp="return abcd();">
<input name="address2" type="text" value="kakinada">
<input name="address3" type="text" value="india">
<input name="lat" type="text">
<input name="lng" type="text">

<input value="Go!" type="submit" onClick="return abcd()" name="submit" >
<!--<div id="mypoint">Latitude:<br>Longitude:<br></div>-->
<div id="map" style="width: 500px; height: 400px;"></div>
</form>

</body>
</html>
