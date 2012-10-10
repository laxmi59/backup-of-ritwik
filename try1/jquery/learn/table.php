<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="jquery_files/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.tabrow').css("background-color","#CCCCCC");
	$('.tabrow').hover(function(){
		$('.tabrow').css("background-color","#FF0000");
	});
});
</script>
</head>

<body>
<table id="tab1">
<tr class="tabrow"><td>row1</td></tr>
<tr class="tabrow"><td>row2</td></tr>
</table>
</body>
</html>