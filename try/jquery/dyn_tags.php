<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn1").click(function(){
		i=Number($("#countervar").val())+1;	
		str='<div id="input'+i+'"><input type="text" name="name[]"  value="'+i+'" /></div>';
		$("#countervar").val(i);
		$("#main_div").append(str);
	});
	$("#btn2").click(function(){
		num = $("#countervar").val();
		$('#input' + num).remove();
		num =num-1;
		$("#countervar").val(num);
	});
});
</script>
</head>

<body>
<div id="main_div">
	<input type="text" name="countervar" id="countervar" value="1" /><br />
	<div id="input1"><input type="text" name="name[]"  value="1" /></div>
</div>
<div>
	<input type="button" name="btn1" id="btn1" value="Add" />&nbsp;<input type="button" name="btn2" id="btn2" value="Remove" />
</div>
</body>
</html>
