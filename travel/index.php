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
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? include FRONT_HEADER;?></td>
  </tr>
  <tr>
    <td background="images/psd1_15.jpg" ><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="37%" valign="top"><? include FRONT_LEFT?></td>
        <td width="7%" valign="top">&nbsp;</td>
        <td width="56%" valign="top"><? include FRONT_RIGHT?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><? include FRONT_FOOTER?></td>
  </tr>
</table>
</body>
</html>
