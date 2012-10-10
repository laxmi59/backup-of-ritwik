<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true
    &amp;key=ABQIAAAAR_F-TPVKyKZtTeE2JqDOyxRLc6hn1sg-0bnf9nR4hPCZLBQmcxTbvtibR3xuq2MqUeJfvBnuwlHfhQ"
    type="text/javascript">
  </script>

			
    <script type="text/javascript">
	
	function initialize() {
	function createMarker(point,html) {
		// ======== Add a "directions" link ======
		html += '<br> <a class="c" href="http://maps.google.com/maps?saddr=&daddr=' + point.toUrlValue() + '" target ="_blank">Directions<\/a>';
		var marker = new GMarker(point);
		GEvent.addListener(marker, "click", function() {
		marker.openInfoWindowHtml(html);
		});
		return marker;
		}
 var map = new GMap2(document.getElementById("map_canvas"));
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());
map.setCenter(new GLatLng( 16.9466886,82.2362367), 15);

var point = new GLatLng(16.9466886,82.2362367 );
//map.setCenter(point, 10);
var marker = createMarker(point,'<div style="width:240px"><b>Setty  Dental San Jose  Office:</b><br>1705 Branham Lane #B4 <br>San Jose CA 95118</div>');
		map.addOverlay(marker);

}

    </script>
</head>

<body onload="initialize()" onunload="GUnload()">
 <div id="map_canvas" style="width: 500px; height: 400px"></div>
</body>
</html>
