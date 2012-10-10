<? session_start();
include "class/class.php";
include "dbcon.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
</head>
<body>
<link href="css/style.css" rel="stylesheet" type="text/css">
<table width="980" class="tabcolor" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td width="25%" valign="top" align="center"><? include "leftlocation.php"?></td>
	<td width="50%" align="center" valign="top"><? include "search2.php" ?> </td>
	<td width="25%">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><p>&nbsp;</p><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
</tr>
<tr><td colspan="3"><? include "footer.php"?></td></tr>
</table>
</body>
</html>