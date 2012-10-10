<? session_start();
include "class/class.php";
include "dbcon.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div align="center">
<div style="width:980px">

<div style="width:980px"><? include "header.php"?></div>
<div style="width:980px; background-color:#FFFFFF">&nbsp;</div>
<div style="background-color:#FFFFFF">
<div style="float:left; width:25%; padding-left:15px" align="center"><? include "leftlocation.php" ?></div>
<div style="margin-left:35%" align="left">
<div style="width:65%;"><? include "search2.php" ?></div>
</div>
</div>

<div style="background-color:#FFFFFF"><? include "footer.php"?></div>
</div>
</div>
</body>
</html>