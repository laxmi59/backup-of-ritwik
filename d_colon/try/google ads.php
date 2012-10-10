<html><head>
<script type="text/javascript" src="http://maps.yahooapis.com/v3.5.2/fl/javascript/apiloader.js?appid=rlerdorf"></script>
<style type="text/css">
#mapContainer { 
height: 600px; 
width: 800px; 
} 
</style> 
<?php
include '/usr/local/lib/php/simple_rss.php';

$url = 'http://earthquake.usgs.gov/eqcenter/recenteqsww/catalogs/eqs7day-M2.5.xml';
$feed = rss_request($url, $timeout=3600);
echo <<<EOB
<title>{$feed['title'][0]}</title>
</head><body>
<h1>{$feed['title'][0]}</h1>
<p><font size="+2">{$feed['description'][0]}<br />
{$feed['pubDate'][0]}</font></p>
EOB;
?>
<div id="mapContainer"></div>
<script type="text/javascript">
var latlon = new LatLon(37.416384, -122.024853);
var mymap = new Map("mapContainer", "rlerdorf", latlon, 13);
mymap.addTool( new PanTool(), true );
navWidget = new NavigatorWidget(); 
mymap.addWidget(navWidget); 
<?php 
  $i = 0;
  while(!empty($feed[$i])) {
    $info  = $feed[$i]['description'][0]."<br />";
    $info .= '<a href="'.$feed[$i]['link'][0].'">'.$feed[$i]['link'][0]."</a>";
?>  
mymap.addMarkerByLatLon(
   new CustomPOIMarker('<?php echo $i?>','<?php echo $feed[$i]['title'][0]?>', '<?php echo $info?>', '0x0012f0', '0xFFFFFF'),
   new LatLon(<?php echo $feed[$i]['lat'][0].','.$feed[$i]['long'][0]?>));
<?php
    $i++;
  }
?>
</script> 
<a href="http://developer.yahoo.net/about"> <img src="http://us.dev1.yimg.com/us.yimg.com/i/us/nt/bdg/websrv_120_1.gif" border="0"></a>
&nbsp;&nbsp;&nbsp;<a href="/php/ymap/yquakes.phps">[Source Code]</a>
</body></html>
