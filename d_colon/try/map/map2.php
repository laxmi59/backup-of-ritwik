<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Google Maps</title>
     <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true
    &amp;key=ABQIAAAAR_F-TPVKyKZtTeE2JqDOyxSkub0_1-W_YbWegRUisOQT0mZrZxRsRlb-JuOnmG4ag_lNfo2hh7x1Mg"
    type="text/javascript">
  </script>

  </head>
  <body onunload="GUnload()">


    <div id="map" style="width: 550px; height: 450px"></div>
      <script type="text/javascript">
    if (GBrowserIsCompatible()) { 

      function createMarker(point,html) {
        // ======== Add a "directions" link ======
        html += '<br> <a href="http://maps.google.com/maps?saddr=&daddr=' + point.toUrlValue() + '" target ="_blank">Directions<\/a>';
      
        var marker = new GMarker(point);
        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        return marker;
      }

      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
     /* map.setCenter(new GLatLng(16.9695443,82.2369371),12);
    
      var point = new GLatLng(16.9695443,82.2369371);*/
	   map.setCenter(new GLatLng(51.5454587,0.0490793),12);
    
      var point = new GLatLng(51.5454587,0.0490793);
	 
      var marker = createMarker(point,'<div style="width:240px">3one technologies<br>baskara estates');
     map.addOverlay(marker);
	

      }
    
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }

    </script>
  </body>

</html>




