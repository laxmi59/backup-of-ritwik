<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#unshow").css("display","none");
	$("#show").click(function(){
		$("#main_div").slideDown("slow");
		$("#show").css("display","none");
		$("#unshow").css("display","block");
	});
	$("#unshow").click(function(){
		$("#main_div").slideUp("slow");
		$("#unshow").css("display","none");
		$("#show").css("display","block");
	});
	$("#unshow").css("display","none");
});
</script>
</head>

<body>
<div id="main_div" style="display:none">
This is my first program in jquery.
</div>
<div><a href="#" id="show" name="ex1Down">SlideDown</a>&nbsp;&nbsp;<a name="ex1Up" href="#" id="unshow">SlideUp</a></div>
</body>
</html>
