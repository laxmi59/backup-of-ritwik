<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#btnAdd').click(function() {
				var num		= $('.clonedInput').length;
				//$(".clonedInput").slideDown("slow");
				var newNum	= new Number(num + 1);

				var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
	
				newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
				$('#input' + num).after(newElem);
				$('#input').slideDown("slow");
				$('#btnDel').attr('disabled','');

				if (newNum == 3)
					$('#btnAdd').attr('disabled','disabled');
			});

			$('#btnDel').click(function() {
				var num	= $('.clonedInput').length;

				$('#input' + num).remove();
				$('#btnAdd').attr('disabled','');

				if (num-1 == 1)
					$('#btnDel').attr('disabled','disabled');
			});

			$('#btnDel').attr('disabled','disabled');
		});
	</script>
</head>

<body>

<form id="myForm">
	<div id="input1" style="margin-bottom:4px;" class="clonedInput">
		Name: <input type="text" name="name1" id="name1" /><br>
		Class: <input type="text" name="name2" id="name2" /><br>
		Group: <input type="text" name="name3" id="name3" />
	</div>

	<div>
		<input type="button" id="btnAdd" value="add another name" />
		<input type="button" id="btnDel" value="remove name" />
	</div>
</form>

</body>
</html>
