<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps JavaScript API Example</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=abcdefg&sensor=true_or_false"
            type="text/javascript"></script>
    <script type="text/javascript">

    /*function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(16.945181, 	82.238647), 13);
        map.setUIToDefault();
      }
    }*/
	function initialize() {
 var map = new GMap2(document.getElementById("map_canvas"));
 <?

 $arr1= array(16.983783,16.9741271);
 $arr2= array(82.282091,82.278697);
 $k=2;
 $i=0; 
 
 while($i < $k)
 {
 ?>
var center = new GLatLng(<?=$arr1[$i]?>,<?=$arr2[$i]?> );
map.setCenter(center, 13);
var marker = new GMarker(center, {draggable: true});

GEvent.addListener(marker, "dragstart", function() {
  map.closeInfoWindow();
  });

GEvent.addListener(marker, "dragend", function() {
  marker.openInfoWindowHtml("Just bouncing along...");
  });

map.addOverlay(marker);

 <? $i++; }?>
}

    </script>
  </head>
  <body onload="initialize()" onunload="GUnload()">
    <div id="map_canvas" style="width: 500px; height: 300px"></div>
  </body>
</html>
