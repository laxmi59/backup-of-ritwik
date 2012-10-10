<html>
<head>
	<title>Select Example</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		
		$("#developer").change(onSelectChange);
		
	});

	function onSelectChange(){
		var selected = $("#developer option:selected");		
		var output = "";
		if(selected.val() != 0){
			output = "You Selected " + selected.text();
		}
		$("#output").html(output);
	}
	</script>
</head>

<body>
	
	<h3>Developers</h3>

	<select id="developer">
		<option value="0">Select Developer</option>
		<option value="1">Todd Sharp</option>
		<option value="2">Brian Meloche</option>
		<option value="3">Ray Camden</option>
		<option value="4">Sean Corfield</option>

		<option value="5">Ben Nadel</option>
		<option value="6">Mark Drew</option>	
		<option value="7">Rey Bango</option>	
		<option value="8">Mark Mandel</option>	
		<option value="9">Joe Rinehart</option>
		<option value="10">Dan Vega</option>						
	</select>
	<br /><br />

	
	<div id="output">
		
	</div>

</body>
</html>