<?
	if($_POST['submit'])
	{
		extract($_POST);
		$d=$_POST['a1'].",".$_POST['a2'].",".$_POST['a3'];
		echo $d;
		echo "<script>location.replace('map3.php?addr=$d')</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<input type="text" name="a1" />
<input type="text" name="a2" />
<input type="text" name="a3" />
<input type="submit" name="submit" value="submit" />
</form>
</body>
</html>
