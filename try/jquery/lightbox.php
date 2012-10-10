<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAba8Tt0uYKnkrkb0C895m_hSGyD6hr9wiI_WG79mA1tOFyNqoWRRNWt9yPzMh7Xmvuk1Q_jtVKJe-Ug" type="text/javascript"></script>
<script type="text/javascript" src="js/gmlightbox.js"></script>
<link href="js/gmlightbox.css" rel="stylesheet" type="text/css" />
<a href="http://maps.google.com/?ie=UTF8&z=11&ll=<?php echo $fieldsObjects['16.93333']->data; ?>,<?php echo $fieldsObjects['82.21667']->data; ?>" rel="gmap">View Google Map</a>
<?php /*?><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn").click(function() {
		var docHeight = $(document).height();
	   $("body").append("<div id='map'></div>");
	   $("#map")
    	  .height(docHeight)
	     .css({
         'opacity' : 0.4,
         'position': 'absolute',
         'top': 0,
         'left': 0,
         'background-color': 'black',
         'width': '100%',
         'z-index': 5000
      });

	});
});
</script>
</head>

<body>
<!--<div id="map" style="width: 298px; height: 377px"></div>-->
<script type="text/javascript">
if (GBrowserIsCompatible()) 
{
	var gmarkers = [];
	var htmls = [];
	var to_htmls = [];
	var from_htmls = [];
	var i=0;
	// A function to create the marker and set up the event window
	function createMarker(point,name,html) {
		var marker = new GMarker(point);
		
		
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
	var point = new GLatLng(34.0047,-118.47);
	map.setCenter(point, 12);
	var marker = createMarker(point,'',"<div>kakinada</div>")
	map.addOverlay(marker);
	
	}else{
		alert("Sorry, the Google Maps API is not compatible with this browser");
}
</script>
<input type="button" name="btn" id="btn" value="click" /><?php */?>
</body>
</html>
