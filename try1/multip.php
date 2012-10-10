<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Multiplication Table</title>
</head>

<body>
<table width="100%">
<tr><th colspan="5">Multiplication Table</th></tr>
  <tr>
  <?php for($i= 1; $i<=5;$i++){?>
    <td>
	<? for($j= 1;$j<=10;$j++) {?>
	<table width="100%" border="1">
	<tr>
		<td><? $k=$i * $j;
		echo " $i * $j = $k";?></td>
	</tr>
	</table>
	<? }?>
	</td>
<?php }?>
  </tr>
</table>
</body>
</html>
