// JavaScript Document
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
	var ad1=document.form1.list_loc.value;
	var ad2=document.form1.list_city.value;
	var ad3=document.form1.list_country.value;
	alert(a);
	showAddress(ad1,ad2,ad3);
}
function showAddress(address) 
{
//alert('aa');
	if (geocoder) {
	geocoder.getLatLng(address,
		function(point) {
		/*if (!point) {
alert(address + " not found");
} else {*/
//alert('aa');
var msg = "Latitude: "+point.lat()+"<br>"+"Longitude: "+point.lng();

document.form1.main1.value=point.lat();
document.form1.main2.value=point.lng();

//}
}
);
}
}