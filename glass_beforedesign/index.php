<? session_start();
/*echo "<script>location.replace('http://smartwomentravelers.com/pearlsoftravelwisdom/')</script>";*/
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
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="sitewidth">
<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
<tr>
	<td class="page txtstyle" align="center" valign="top">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td class="leftbar"><? include FRONT_LEFT?></td>
		<td class="rightbar trpad"><? include FRONT_RIGHT?></td>
	</tr>
	</table>
	</td>
</tr>
<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>
