<?php
    require('GoogleMapAPI.class.php');

    $map = new GoogleMapAPI('map');
    // setup database for geocode caching
    //$map->setDSN('mysql://USER:PASS@localhost/GEOCODES');
    // enter YOUR Google Map Key
    //$map->setAPIKey('YOURGOOGLEMAPKEY');
    
    // create some map markers16� 57' N 
    $map->addMarkerByAddress('621 N 48th St # 6 Lincoln NE 68502','PJ Pizza','<b>PJ Pizza</b>');
    $map->addMarkerByAddress('826 P St Lincoln NE 68502','Old Chicago','<b>Old Chicago</b>');
    $map->addMarkerByAddress('3457 Holdrege St Lincoln NE 68502',"Valentino's","<b>Valentino's</b>");
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
    <?php $map->printHeaderJS(); ?>
    <?php $map->printMapJS(); ?>
    <!-- necessary for google maps polyline drawing in IE -->
    <style type="text/css">
      v\:* {
        behavior:url(#default#VML);
      }
    </style>
    </head>
    <body onload="onLoad()">
    <table align="center" style="border:1px solid">
	<tr><td><?php $map->printSidebar(); ?></td></tr>
	<tr><td><?php $map->printMap(); ?></td><td>
    </table>
	
    </body>
    </html>
