<html>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script>
var current = 1;

function addPerson() {
	console.log('running addPerson')
	//current keeps track of how many people we have.
	current++;
	var strToAdd = '<p><label for="firstname"'+current+'">Name</label> <em>*</em><input id="firstname'+current+'" name="firstname'+current+'" size="25" /> <input id="lastname'+current+'" name="lastname'+current+'" size="25" />'
	strToAdd += '<p><label for="email'+current+'">Email</label>	<em>*</em><input id="email'+current+'" name="email'+current+'" size="25" /></p>'
	console.log(strToAdd)
	$('#mainField').append(strToAdd)
}

$(document).ready(function(){
	$('#addPerson').click(addPerson)
});
</script>
</head>

<body>

<form id="someform" method="post">
	<fieldset id="mainField">
		<p>
		<label for="firstname1">Name</label>
		<em>*</em><input id="firstname1" name="firstname1" size="25" /> <input id="lastname1" name="lastname1" size="25" />
		</p>
		<p>
		<label for="email1">Email</label>
		<em>*</em><input id="email1" name="email1" size="25" />
		</p>
	</fieldset>
	
	<p>
	<input type="button" id="addPerson" value="Add Another Person">
	</p>
	
	<input type="submit" value="Save">
</form>

</body>
</html>