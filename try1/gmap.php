<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAba8Tt0uYKnkrkb0C895m_hSGyD6hr9wiI_WG79mA1tOFyNqoWRRNWt9yPzMh7Xmvuk1Q_jtVKJe-Ug" type="text/javascript"></script>
<script type="text/javascript">
var map = null;
var geocoder = null;
function load() 
{
	//alert('aa');
	if (GBrowserIsCompatible()) {
	map = new GMap2(document.getElementById("map"));
	geocoder = new GClientGeocoder();
	}
}
function lat_lng()
{
	//alert("Aa");
	var ad1=document.pgenerate.list_loc.value;
	var ad2=document.pgenerate.list_city.value;
	var ad3=document.pgenerate.list_country.value;
	var addr=ad1+","+ad2+","+ad3;
	showAddress(addr);
}
function showAddress(address) 
{
	if (geocoder) {
		geocoder.getLatLng(address,
		function(point) {
			var msg = "Latitude: "+point.lat()+"<br>"+"Longitude: "+point.lng();
			document.pgenerate.main1.value=point.lat();
			document.pgenerate.main2.value=point.lng();
		}
		);
	}
}
</script>

<body onLoad="load()" onUnload="GUnload()" >
<form name="pgenerate">
<input type="text" name="list_loc">
<input type="text" name="list_city">
<input type="text" name="list_country">
<input type="text" name="main1">
<input type="text" name="main2"><div id="map" style="width: 500px; height: 400px; display:none;"></div>
<input type="button" name="btn" value="submit" onClick="javascript:lat_lng()">
</form>
<div id="map" style="width: 298px; height: 377px"></div>
	 <script type="text/javascript">
     if (GBrowserIsCompatible()) {
       var gmarkers = [];
			      var htmls = [];
			      var to_htmls = [];
			      var from_htmls = [];
			      var i=0;
			      // A function to create the marker and set up the event window
			      function createMarker(point,name,html) {
				  var marker = new GMarker(point);
		        	// The info window version with the "to here" form open
				to_htmls[i] = html + 'Directions: To here - <a  href="javascript:fromhere(' + i + ')">From here<\/a>' +
           '<br>Start address:<form action="http://maps.google.com/maps" method="get" target="_blank">' +
           '<input type="text" SIZE=40 MAXLENGTH=40 name="saddr" id="saddr" value="" /><br>' +
           '<INPUT value="Get Directions" TYPE="SUBMIT">' +
           '<input type="hidden" name="daddr" value="' + point.lat() + ',' + point.lng() + 
                  // "(" + name + ")" + 
           '"/>';
        // The info window version with the "to here" form open
        from_htmls[i] = html + 'Directions: <a class="d" href="javascript:tohere(' + i + ')">To here<\/a> - <b>From here<\/b>' +
           '<br>End address:<form action="http://maps.google.com/maps" method="get"" target="_blank">' +
           '<input type="text" SIZE=40 MAXLENGTH=40 name="daddr" id="daddr" value="" /><br>' +
           '<INPUT value="Get Directions" TYPE="SUBMIT">' +
           '<input type="hidden" name="saddr" value="' + point.lat() + ',' + point.lng() +
                  // "(" + name + ")" + 
           '"/>';
        // The inactive version of the direction info
        html = html + 'Directions: <a class="b" href="javascript:tohere('+i+')">To here<\/a> - <a class="b"  href="javascript:fromhere('+i+')">From here<\/a>';

        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        gmarkers[i] = marker;
        htmls[i] = html;
        i++;
        return marker;
      }

      // functions that open the directions forms
      function tohere(i) {
        gmarkers[i].openInfoWindowHtml(to_htmls[i]);
      }
      function fromhere(i) {
        gmarkers[i].openInfoWindowHtml(from_htmls[i]);
      }
      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
     // map.setCenter(new GLatLng(16.945181,82.238647),15);
	  var point = new GLatLng(document.getElementById('main1').value,document.getElementById('main2').value);
	  map.setCenter(point, 12);
	  var marker = createMarker(point,'',"<div><?=$city?></div>")
      map.addOverlay(marker);
	
	 }else{
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }
</script>
</body>