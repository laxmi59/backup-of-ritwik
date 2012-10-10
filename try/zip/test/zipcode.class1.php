<?php
// constants for setting the $units data member
define('_UNIT_MILES', 'm');
define('_UNIT_KILOMETERS', 'k');
// constants for passing $sort to get_zips_in_range()
define('_ZIPS_SORT_BY_DISTANCE_ASC', 1);
define('_ZIPS_SORT_BY_DISTANCE_DESC', 2);
define('_ZIPS_SORT_BY_ZIP_ASC', 3);
define('_ZIPS_SORT_BY_ZIP_DESC', 4);
// constant for miles to kilometers conversion
define('_M2KM_FACTOR', 1.609344);
class zipcode_class {
   var $last_error = "";            // last error message set by this class
   var $last_time = 0;              // last function execution time (debug info)
   var $units = _UNIT_MILES;        // miles or kilometers
   var $decimals = 2;               // decimal places for returned distance
   function get_zips_in_range($zip, $range, $sort=1, $include_base) {
      $this->chronometer();                     // start the clock
      $details = $this->get_zip_point($zip); 
	  // echo $details; // base zip details
      if ($details == false) return false;
      $lat_range = $range/69.172;
	  //echo $lat_range;
      $lon_range = abs($range/(cos($details[0]) * 69.172));
      $min_lat = number_format($details[0] - $lat_range, "4", ".", "");
      $max_lat = number_format($details[0] + $lat_range, "4", ".", "");
      $min_lon = number_format($details[1] - $lon_range, "4", ".", "");
      $max_lon = number_format($details[1] + $lon_range, "4", ".", "");
      $return = array();    // declared here for scope
      $sql = "SELECT zip_code, LATITUDE, LONGITUDE FROM zipcode_old1 ";
      if (!$include_base) $sql .= "WHERE zip_code <> '$zip' AND ";
      else $sql .= "WHERE "; 
      $sql .= "LATITUDE BETWEEN '$min_lat' AND '$max_lat' AND LONGITUDE BETWEEN '$min_lon' AND '$max_lon'";
      //echo $sql;       
      $r = mysql_query($sql);
      if (!$r) {    // sql error
         $this->last_error = mysql_error();
         return false;
      } else {
         while ($row = mysql_fetch_row($r)) {
            // loop through all 40 some thousand zip codes and determine whether
            // or not it's within the specified range.
            $dist = $this->calculate_mileage($details[0],$row[1],$details[1],$row[2]);
            if ($this->units == _UNIT_KILOMETERS) $dist = $dist * _M2KM_FACTOR;
            if ($dist <= $range) {
               $return[str_pad($row[0], 5, "0", STR_PAD_LEFT)] = round($dist, $this->decimals);
            }
         }
         mysql_free_result($r);
      }
      // sort array
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
   // chronometer function taken from the php manual.  This is used primarily
   // for debugging and anlyzing the functions while developing this class.  
   $now = microtime(TRUE);  // float, in _seconds_
   $now = $now + time();
   $malt = 1;
   $round = 7;
   if ($this->last_time > 0) {
       /* Stop the chronometer : return the amount of time since it was started,
       in ms with a precision of 3 decimal places, and reset the start time.
       We could factor the multiplication by 1000 (which converts seconds
       into milliseconds) to save memory, but considering that floats can
       reach e+308 but only carry 14 decimals, this is certainly more precise */
       $retElapsed = round($now * $malt - $this->last_time * $malt, $round);
       $this->last_time = $now;
       return $retElapsed;
   } else {
       // Start the chronometer : save the starting time
       $this->last_time = $now;
       return 0;
   }
}
function get_zip_point($zip) {
      // This function pulls just the lattitude and longitude from the
      // database for a given zip code.
      $sql = "SELECT LATITUDE, LONGITUDE from zipcode_old1 WHERE zip_code='$zip'";
	 // echo $sql;
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
      // used internally, this function actually performs that calculation to
      // determine the mileage between 2 points defined by lattitude and
      // longitude coordinates.  This calculation is based on the code found
      // at http://www.cryptnet.net/fsp/zipdy/
      // Convert lattitude/longitude (degrees) to radians for calculations
      $lat1 = deg2rad($lat1);
      $lon1 = deg2rad($lon1);
      $lat2 = deg2rad($lat2);
      $lon2 = deg2rad($lon2);
      // Find the deltas
      $delta_lat = $lat2 - $lat1;
      $delta_lon = $lon2 - $lon1;
      // Find the Great Circle distance 
      $temp = pow(sin($delta_lat/2.0),2) + cos($lat1) * cos($lat2) * pow(sin($delta_lon/2.0),2);
      $distance = 3956 * 2 * atan2(sqrt($temp),sqrt(1-$temp));
      return $distance;
   }
}