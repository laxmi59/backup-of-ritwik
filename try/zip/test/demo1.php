<?
mysql_connect('localhost','root','') or die(mysql_error()); 
mysql_select_db('adit') or die(mysql_error()); 
$pcode="11111";
$miles=2;
?>
<?php
/*
define('_UNIT_MILES', 'm');
define('_UNIT_KILOMETERS', 'k');
define('_ZIPS_SORT_BY_DISTANCE_ASC', 1);
define('_ZIPS_SORT_BY_DISTANCE_DESC', 2);
define('_ZIPS_SORT_BY_ZIP_ASC', 3);
define('_ZIPS_SORT_BY_ZIP_DESC', 4);
define('_M2KM_FACTOR', 1.609344);
class zipcode_class {
   var $last_error = "";            // last error message set by this class
   var $last_time = 0;              // last function execution time (debug info)
   var $units = _UNIT_MILES;        // miles or kilometers
   var $decimals = 2;               // decimal places for returned distance
   function get_zips_in_range($zip, $range, $sort=1, $include_base) {
      $this->chronometer();                     // start the clock
      $details = $this->get_zip_point($zip); 
      if ($details == false) return false;
      $lat_range = $range/69.172;
      $lon_range = abs($range/(cos($details[0]) * 69.172));
      $min_lat = number_format($details[0] - $lat_range, "4", ".", "");
      $max_lat = number_format($details[0] + $lat_range, "4", ".", "");
      $min_lon = number_format($details[1] - $lon_range, "4", ".", "");
      $max_lon = number_format($details[1] + $lon_range, "4", ".", "");
      $return = array();    // declared here for scope
      $sql = "SELECT ZIP_CODE, LATITUDE, LONGITUDE FROM zip_code";
      if (!$include_base) $sql .= " WHERE ZIP_CODE <> '$zip' AND ";
      else $sql .= " WHERE "; 
      $sql .= "LATITUDE BETWEEN '$min_lat' AND '$max_lat' AND LONGITUDE BETWEEN '$min_lon' AND '$max_lon'";
      $r = mysql_query($sql);
      if (!$r) {    // sql error
         $this->last_error = mysql_error();
         return false;
      } else {
         while ($row = mysql_fetch_row($r)) {
            $dist = $this->calculate_mileage($details[0],$row[1],$details[1],$row[2]);
            if ($this->units == _UNIT_KILOMETERS) $dist = $dist * _M2KM_FACTOR;
            if ($dist <= $range) {
               $return[str_pad($row[0], 5, "0", STR_PAD_LEFT)] = round($dist, $this->decimals);
            }
         }
         mysql_free_result($r);
      }
      switch($sort){
         case _ZIPS_SORT_BY_DISTANCE_ASC:
            asort($return);
            break;
         case _ZIPS_SORT_BY_DISTANCE_DESC:
            arsort($return);
            break;
         case _ZIPS_SORT_BY_ZIP_ASC:
            ksort($return);
            break;
         case _ZIPS_SORT_BY_ZIP_DESC:
            krsort($return);
            break; 
      }
      $this->last_time = $this->chronometer();
      if (empty($return)) return false;
      return $return;
   }   
	function chronometer()  {
   $now = microtime(TRUE);  // float, in _seconds_
   $now = $now + time();
   $malt = 1;
   $round = 7;
   if ($this->last_time > 0) {
       $retElapsed = round($now * $malt - $this->last_time * $malt, $round);
       $this->last_time = $now;
       return $retElapsed;
   } else {
       $this->last_time = $now;
       return 0;
   }
}
function get_zip_point($zip) {
      $sql = "SELECT LATITUDE, LONGITUDE from zip_code WHERE ZIP_CODE='$zip'";
      $r = mysql_query($sql);
      if (!$r) {
         $this->last_error = mysql_error();
         return false;
      } else {
         $row = mysql_fetch_array($r);
         mysql_free_result($r);
         return $row;       
      }      
   }
  function calculate_mileage($lat1, $lat2, $lon1, $lon2) {
      $lat1 = deg2rad($lat1);
      $lon1 = deg2rad($lon1);
      $lat2 = deg2rad($lat2);
      $lon2 = deg2rad($lon2);
      $delta_lat = $lat2 - $lat1;
      $delta_lon = $lon2 - $lon1;
      $temp = pow(sin($delta_lat/2.0),2) + cos($lat1) * cos($lat2) * pow(sin($delta_lon/2.0),2);
      $distance = 3956 * 2 * atan2(sqrt($temp),sqrt(1-$temp));
      return $distance;
   }
}

$z = new zipcode_class;
echo '<h3>A sample getting all the zip codes withing a range: 2 miles from $pcode</h3>';
$zips = $z->get_zips_in_range($pcode, $miles, _ZIPS_SORT_BY_DISTANCE_ASC, true); 
if ($zips === false) echo 'Error: '.$z->last_error;
else {
   foreach ($zips as $key => $value) {
      //echo "Zip code <b>$key</b> is <b>$value</b> miles away from <b>$pcode</b>.<br />";
	   echo $key.", ";
   }
   echo "<br /><i>get_zips_in_range() executed in <b>".$z->last_time."</b> seconds.</i><br />";
}*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$tt=mysql_fetch_array(mysql_query("select LATITUDE,LONGITUDE from zip_code where ZIP_CODE=$pcode"));
$sel="select distinct ZIP_CODE ,LATITUDE,LONGITUDE, (select (1.852 * 60.0 * ((atan((sqrt(1-(select (sin(Radians(LATITUDE)) * sin(Radians($tt[LATITUDE])) + cos(Radians(LATITUDE)) * cos(Radians($tt[LATITUDE])) * cos(abs((Radians($tt[LONGITUDE]))-(Radians(LONGITUDE))))))*(select (sin(Radians(LATITUDE)) * sin(Radians($tt[LATITUDE])) + cos(Radians(LATITUDE)) * cos(Radians($tt[LATITUDE])) * cos(abs((Radians($tt[LONGITUDE]))-(Radians(LONGITUDE))))))))/(select (sin(Radians(LATITUDE)) * sin(Radians($tt[LATITUDE])) + cos(Radians(LATITUDE)) * cos(Radians($tt[LATITUDE])) * cos(abs((Radians($tt[LONGITUDE]))-(Radians(LONGITUDE)))))))/3.14159265358979323846)*180))/1.609344) as distance from zip_code  where (select (1.852 * 60.0 * ((atan((sqrt(1-(select (sin(Radians(LATITUDE)) * sin(Radians($tt[LATITUDE])) + cos(Radians(LATITUDE)) * cos(Radians($tt[LATITUDE])) * cos(abs((Radians($tt[LONGITUDE]))-(Radians(LONGITUDE))))))*(select (sin(Radians(LATITUDE)) * sin(Radians($tt[LATITUDE])) + cos(Radians(LATITUDE)) * cos(Radians($tt[LATITUDE])) * cos(abs((Radians($tt[LONGITUDE]))-(Radians(LONGITUDE))))))))/(select (sin(Radians(LATITUDE)) * sin(Radians($tt[LATITUDE])) + cos(Radians(LATITUDE)) * cos(Radians($tt[LATITUDE])) * cos(abs((Radians($tt[LONGITUDE]))-(Radians(LONGITUDE)))))))/3.14159265358979323846)*180))/1.609344) 
< $miles order by distance";
$query=mysql_query($sel);
while($fet=mysql_fetch_array($query)){
//echo $fet['ZIP_CODE']."-----".$fet['distance']."<br>";
echo $fet['ZIP_CODE'].", ";
}

?>