<? 
if($_GET['a1']<>'' && $_GET['a2']<>'')
{
	if($_GET['a3']<>'')
	{
		$xx=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_city='".$_GET['a3']."' and `list_status`='a'");
				//echo "select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_city='".$_GET['a3']."'";
	}
	if($_GET['a6']<>'')
	{
		$xx=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_bedroom='".$_GET['a6']."' and `list_status`='a'");
	}
			
}
if($_GET['cid']){
	$xx=$list->areaid($_GET['cid']);
	$i=1;
}
if($_GET['aid']){
   	$xx=$list->areasid($_GET['aid']);
	$i=1;
}
?>	 
<div id="map" style="width: 400px; height: 350px"></div>
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
				to_htmls[i] = html + '<br>Directions: <b>To here<\/b> - <a  href="javascript:fromhere(' + i + ')">From here<\/a>' +
           '<br>Start address:<form action="http://maps.google.com/maps" method="get" target="_blank">' +
           '<input type="text" SIZE=40 MAXLENGTH=40 name="saddr" id="saddr" value="" /><br>' +
           '<INPUT value="Get Directions" TYPE="SUBMIT">' +
           '<input type="hidden" name="daddr" value="' + point.lat() + ',' + point.lng() + 
                  // "(" + name + ")" + 
           '"/>';
        // The info window version with the "to here" form open
        from_htmls[i] = html + '<br>Directions: <a class="d" href="javascript:tohere(' + i + ')">To here<\/a> - <b>From here<\/b>' +
           '<br>End address:<form action="http://maps.google.com/maps" method="get"" target="_blank">' +
           '<input type="text" SIZE=40 MAXLENGTH=40 name="daddr" id="daddr" value="" /><br>' +
           '<INPUT value="Get Directions" TYPE="SUBMIT">' +
           '<input type="hidden" name="saddr" value="' + point.lat() + ',' + point.lng() +
                  // "(" + name + ")" + 
           '"/>';
        // The inactive version of the direction info
        html = html + '<br>Directions: <a class="a" href="javascript:tohere('+i+')">To here<\/a> - <a class="a"  href="javascript:fromhere('+i+')">From here<\/a>';

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
	 <? if($number=mysql_num_rows($xx)<>''){
	  while($bb=mysql_fetch_array($xx)){
	 // echo $bb['list_lat'];?>
		 var point = new GLatLng(<?=$bb['list_lat']?>,<?=$bb['list_lng']?>);
	  map.setCenter(point, 12);
	  var marker = createMarker(point,'','<? print $prop->property2($bb['list_property'])." for ".$req->req1($bb['list_type'])." in ".$bb['list_location'].",".$bb['list_city']."<br> Area".$bb['list_area']."Sq.Ft with".$bb['list_bedroom']."Bedrooms"."<br>Rs.".$bb['list_price']?><? if($bb['list_pricing']=='yes'){ echo " Negotiable";}else{ echo " Not Negotiable";}?>')
      map.addOverlay(marker);
	  <? }}?>
 }  else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }
    </script>