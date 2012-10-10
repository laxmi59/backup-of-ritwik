<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
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
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%" align="center" valign="top"><? //include FRONT_LEFT?></td>
        <td  width="92%" valign="top" align="left">
		<table cellpadding="0" cellspacing="0" width="90%">
		<tr>
			<td width="35%">&nbsp;</td>
			<td width="65%"><iframe width="700" height="650" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=google+map+for+las+vegas+hotels&amp;sll=36.112343,-115.165435&amp;sspn=0.030093,0.055189&amp;gl=in&amp;ie=UTF8&amp;hq=google+map+for+las+vegas+hotels&amp;hnear=&amp;ll=36.112343,-115.165435&amp;spn=0.030093,0.055189&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=google+map+for+las+vegas+hotels&amp;sll=36.112343,-115.165435&amp;sspn=0.030093,0.055189&amp;gl=in&amp;ie=UTF8&amp;hq=google+map+for+las+vegas+hotels&amp;hnear=&amp;ll=36.112343,-115.165435&amp;spn=0.030093,0.055189" style="color:#0000FF;text-align:left">View Larger Map</a></small></td>
		</tr>
		</table>
        <td width="5%" align="center" valign="top"><? //include FRONT_RIGHT?></td>
      </tr>
    </table></td>
  </tr>
<tr><td><P>&nbsp;</P></td></tr>
<tr>
  	<td><? include FRONT_FOOTER?></td>
</tr>
</table>
</body>
</html>
