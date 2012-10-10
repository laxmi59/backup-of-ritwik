<html>
<head>
<script>
//var wordLimit = 10;
var holdText;
var disabledBox = false;

function countEm(wordLimit,txt,track){
	var text1 = document.getElementById(txt).value;
	var numberOfWords = doCount(text1);
 	if(numberOfWords == wordLimit) {
  		holdText = text1;
 	}//end if
	document.getElementById(track).value = wordLimit - numberOfWords;
	if(numberOfWords >= wordLimit)
		disabledBox = true;
	else
		disabledBox = false;
}//end function

function doCount(textParam){
	//replace all instances of one-or-more spaces with a single space
	var text2 = textParam.replace(/\s+/g, ' ');
	//trim leading and tailing spaces
	while(text2.substring(0, 1) == ' ')
		text2 = text2.substring(1);
	while(text2.substring(text2.length-2, text2.length-1) == ' ')
		text2 = text2.substring(0,text2.length-1);
	var text3 = text2.split(' ');
	return text3.length;
}//end function

function maybeReset(wordLimit,txt){
	if(disabledBox){
		var currText = document.getElementById(txt).value;
		var newLength = doCount(currText);
		//prevent user from adding words, but not taking them away
		if(newLength > wordLimit) {
			document.getElementById(txt).value = holdText;
			alert("Word limit exceded");
			
		}//end if
	}//end if
}//end function
</script>
</head>
<body>
<form name='myForm' >
<textarea name='myTextBox' id="myTextBox" onkeydown='countEm(5,"myTextBox","myTracker");' onkeyup='maybeReset(5,"myTextBox");'></textarea><br />
<input type='text' name='myTracker' id="myTracker" />
</form>
</body>
</html>

<!--<html>
<head>
<script>
var wordLimit = 10;
var holdText;
var disabledBox = false;

function countEm(){
	var text1 = document.forms['myForm'].elements['myTextBox'].value;
	var numberOfWords = doCount(text1);
 	if(numberOfWords == wordLimit) {
  		holdText = text1;
 	}//end if
	document.forms['myForm'].elements['myTracker'].value = wordLimit - numberOfWords;
	if(numberOfWords >= wordLimit)
		disabledBox = true;
	else
		disabledBox = false;
}//end function

function doCount(textParam){
	//replace all instances of one-or-more spaces with a single space
	var text2 = textParam.replace(/\s+/g, ' ');
	//trim leading and tailing spaces
	while(text2.substring(0, 1) == ' ')
		text2 = text2.substring(1);
	while(text2.substring(text2.length-2, text2.length-1) == ' ')
		text2 = text2.substring(0,text2.length-1);
	var text3 = text2.split(' ');
	return text3.length;
}//end function

function maybeReset(){
	if(disabledBox){
		var currText = document.forms['myForm'].elements['myTextBox'].value;
		var newLength = doCount(currText);
		//prevent user from adding words, but not taking them away
		if(newLength > wordLimit) {
			document.forms['myForm'].elements['myTextBox'].value = holdText;
		}//end if
	}//end if
}//end function
</script>
</head>
<body>
<form name='myForm' >
<textarea name='myTextBox' onkeydown='countEm();' onkeyup='maybeReset();'></textarea><br />
<input type='text' name='myTracker' />
</form>
</body>
</html>
-->