<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
extract($_POST);
//print_r($_POST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="css/search.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
	<td><? include FRONT_HEADER;?></td>
</tr>

<tr><td>&nbsp;</td></tr>
<? if($_GET['link']){ //echo $_GET['link'];?>
<tr>
	<td align="center"><iframe style="width:900px; height:1000px; border:none; background-color:#FFFFFF;" src="<?=$_GET['link']?>"></iframe></td>
</tr>  
<? }?>
<!--Array ( [cid] => 312476 [pageName] => hotSearch [validateDates] => true [validateCity] => true [mode] => 2 [submitted] => true [netOnly] => false [fc] => list [locale] => en_US [currencyCode] => USD [specials] => false [city] => [stateProvince] => [country] => [showPopUp] => true [passThrough] => true [radcity] => New York City [cityText] => [arrivalMonth] => 0 [arrivalDay] => 1 [departureMonth] => 0 [departureDay] => 1 ) -->
<? if($_GET['link1']){
$tt=$_GET['link1']."&cid=312476&action=viewLocation";
//$tt="http://travel.ian.com/hotel/searchresults?cid=312476&currencyCode=USD&searchType=DESTINATION&searchParam=572b0850-4e3f-469b-87b2-c17ed3ea049b";?>
<tr>
	<td align="center"><iframe style="width:900px; height:1000px; border:none; background-color:#FFFFFF;" src="<?=$tt?>"></iframe><?=$tt?></td>
</tr>  
<? }?>
</table>
</body>
</html>
